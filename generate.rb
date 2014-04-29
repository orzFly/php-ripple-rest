require 'json'
require 'stringio'

class String
  def underscore
    self.gsub(/::/, '/').
    gsub(/([A-Z]+)([A-Z][a-z])/,'\1_\2').
    gsub(/([a-z\d])([A-Z])/,'\1_\2').
    tr("-", "_").
    downcase
  end
  def camel_case
    return self if self !~ /_/ && self =~ /[A-Z]+.*/
    split('_').map{|e| e.capitalize}.join
  end
  def camel_case_lower
    self.split('_').inject([]){ |buffer,e| buffer.push(buffer.empty? ? e : e.capitalize) }.join
  end
end

schemas = {}
Dir["json/*.json"].each do |i|
  key = File.basename(i, ".json")
  schemas[key] = JSON.parse File.read i
end

arraylist = []
schemas.values.select{|i|i["type"] == "object"}.each do |json|
  key = json["title"]
  
  io = open "src/RippleRest#{key}.php", "w"
  to_array = StringIO.new
  io2 = StringIO.new
  helpio = StringIO.new
  patterncache = StringIO.new
  json["properties"].each do |k, v|
    type = ""
    type2 = typeobj = to = from = check = nil
    if v["type"] == "string" && v["pattern"]
      type = "string"
      type2 = "`" + Regexp.new(v["pattern"]).inspect + "`"
      typeobj = [:String, v["pattern"]]
    elsif v["type"] == "string"
      type = "string"
      typeobj = :String
    elsif v["type"] == "boolean"
      type = "boolean"
      typeobj = :Boolean
    elsif v["type"] == "array"
      type = "#{v["items"]["$ref"]}[]"
      typeobj = :"Array#{v["items"]["$ref"]}"
      arraylist << v["items"]["$ref"]
    elsif v["type"] == "float"
      type = "float"
      typeobj = :Float
    elsif v["$ref"] && (!schemas[v["$ref"]] || schemas[v["$ref"]]["type"] == "string")
      type = "string"
      type2 = v["$ref"]
      typeobj = v["$ref"].to_sym
    elsif v["$ref"]
      type = "RippleRest#{v["$ref"]}"
      typeobj = v["$ref"].to_sym
    elsif
      raise "Unsupported type"
    end
    
    
    if type2
      helpdesc = "(#{type2}) "
    else
      helpdesc = ""
    end
    helpio.puts " * @property #{type} $#{k.camel_case_lower} #{helpdesc}#{v["description"]}"
    
    if typeobj.is_a? Symbol
      to = lambda { |x| "self::_to#{typeobj}(#{x})" }
      from = lambda { |x| "self::_from#{typeobj}(#{x})" }
      check = lambda { |x| "self::_check#{typeobj}(#{x})" }
    elsif typeobj.is_a?(Array) && typeobj[0] == :String
      patterncache.puts <<EOF
    /**
     * Pattern Rule for field `RippleRest#{key}::$#{k.camel_case_lower}`
     * @see RippleRest#{key}::$#{k.camel_case_lower}
     * @see RippleRest#{key}::set#{k.camel_case}
     * @see RippleRest#{key}::get#{k.camel_case}
     */
    const PATTERN_#{k.upcase} = #{typeobj[1].inspect};
    
EOF
      to = lambda { |x| "self::_toStringPattern(#{x}, self::PATTERN_#{k.upcase})" }
      from = lambda { |x| "self::_fromStringPattern(#{x}, self::PATTERN_#{k.upcase})" }
      check = lambda { |x| "self::_checkStringPattern(#{x}, self::PATTERN_#{k.upcase})" }
    end
    io2.puts <<EOF
    
    /**
     * @internal
     */
    protected $_#{k.camel_case};
    
    /**
     * #{v["description"]}
     * @see RippleRest#{key}::$#{k.camel_case_lower}
     * @see RippleRest#{key}::set#{k.camel_case}
     * @return #{type} #{helpdesc}
     */
    public function get#{k.camel_case}() {
        return $this->_#{k.camel_case};
    }
    
    /**
     * #{v["description"]}
     * @see RippleRest#{key}::$#{k.camel_case_lower}
     * @see RippleRest#{key}::get#{k.camel_case}
     * @param #{type} $value #{helpdesc}
     * @return null
     */
    public function set#{k.camel_case}($value) {
        try {
            if (!#{check.("$value")}) throw new Exception("");
            $this->_#{k.camel_case} = #{from.("$value")};
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . #{type.inspect});
        }
    }
    
    /**
     * @internal
     */
    protected function init#{k.camel_case}($value) {
        $this->_#{k.camel_case} = #{from.("$value")};
    }
EOF
    to_array.puts <<EOF
    
        $array[#{k.inspect}] = #{to.("$this->_#{k.camel_case}")};
EOF
    if (json["required"] || []).include?(k)
      to_array.puts <<EOF
        if (is_null($array[#{k.inspect}]))
            throw new Exception("Field #{k.camel_case} is required in RippleRest#{key}");
EOF
    else
      to_array.puts <<EOF
        if (is_null($array[#{k.inspect}])) unset($array[#{k.inspect}]);
EOF
    end
  end
io.puts <<EOF
<?php
/**
 * Contains class RippleRest#{key}
 *
 * @license MIT
 */


/**
 * #{json['description']}
#{helpio.string}
 */
class RippleRest#{key} extends RippleRestObject {
    /**
     * @internal
     */
    protected static $__properties = array(
        #{
          json["properties"].keys.map{|i|
            [
              "#{i.downcase.inspect} => #{i.camel_case.inspect}",
              "#{i.camel_case.downcase.inspect} => #{i.camel_case.inspect}"
            ]
          }.flatten.join(", \n        ")
        }
    );
    
#{patterncache.string}
    
    /**
     * @internal
     */
    protected $__data = array();
    
    /**
     * @internal
     */
    public function __set($name, $value)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "set" . self::$__properties[strtolower($name)];
            return $this->$key($value);
        }
        else
        {
            return $this->__data[$name] = $value;
        }
    }

    /**
     * @internal
     */
    public function __get($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "get" . self::$__properties[strtolower($name)];
            return $this->$key();
        }
        else
        {
            if (array_key_exists($name, $this->__data)) {
                return $this->data[$name];
            }

            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
            return null;
        }
    }

    /**
     * @internal
     */
    public function __isset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            return true;
        }
        return isset($this->__data[$name]);
    }

    /**
     * @internal
     */
    public function __unset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "set" . self::$__properties[strtolower($name)];
            return $this->$key(null);
        }
        unset($this->__data[$name]);
    }
    
    /**
     * Create a new instance of RippleRest#{key}.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRest#{key}
     */
    public function __construct($data = null) 
    {
        if (is_array($data))
        {
            foreach($data as $name => $value)
            {
                if (isset(self::$__properties[strtolower($name)]))
                {
                    $key = "init" . self::$__properties[strtolower($name)];
                    $this->$key($value);
                }
                else
                {
                    $this->__data[$name] = $value;
                }
            }
        }
    }
    
#{io2.string}

    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
    public function toArray()
    {
        $array = array();
#{to_array.string}
        return $array;
    }
}
EOF
  io.close
end



open "src/RippleRestObject.php", "w" do |io|
  io.puts <<EOF
<?php
/**
 * Contains class RippleRestObject
 *
 * @license MIT
 */

/**
 * A super class for all schemas used in RippleRest.
 */
abstract class RippleRestObject {
    /**
     * @internal
     */
    protected static function _toString($x) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _fromString($x) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _checkString($x) { if(is_null($x)) return true; return true; }
    
    /**
     * @internal
     */
    protected static function _toStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _fromStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _checkStringPattern($x, $pattern) { if(is_null($x)) return true; return (bool) preg_match((string) $x, '`' . $pattern .'`'); }
    
    /**
     * @internal
     */
    protected static function _toBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    /**
     * @internal
     */
    protected static function _fromBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    /**
     * @internal
     */
    protected static function _checkBoolean($x) { if(is_null($x)) return true; return true; }
    
    /**
     * @internal
     */
    protected static function _toFloat($x) { if(is_null($x)) return null; return (float) $x; }
    /**
     * @internal
     */
    protected static function _fromFloat($x) { if(is_null($x)) return null; return (float) $x; }
    /**
     * @internal
     */
    protected static function _checkFloat($x) { if(is_null($x)) return true; return true; }

EOF

  schemas.values.select{|i|i["type"] == "string"}.each do |json|
    key = json["title"].to_sym
    
    io.puts <<EOF
    /**
     * #{json["description"]}
     */
    const PATTERN_TYPE_#{key.upcase} = #{json["pattern"].inspect};
    
    /**
     * @internal
     */
    protected static function _to#{key}($x) { if(is_null($x)) return null; return self::_toStringPattern($x, PATTERN_TYPE_#{key.upcase}); }
    /**
     * @internal
     */
    protected static function _from#{key}($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, PATTERN_TYPE_#{key.upcase}); }
    /**
     * @internal
     */
    protected static function _check#{key}($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, PATTERN_TYPE_#{key.upcase}); }
    
EOF
  end

  schemas.values.select{|i|i["type"] == "object"}.each do |json|
    key = json["title"]
    io.puts <<EOF
    /**
     * @internal
     */
    protected static function _to#{key}($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _from#{key}($x) { if(is_null($x)) return null; return ($x instanceof RippleRest#{key}) ? $x : new RippleRest#{key}($x); }
    /**
     * @internal
     */
    protected static function _check#{key}($x) { if(is_null($x)) return true; return ($x instanceof RippleRest#{key}); }
    
EOF
  end
  
  arraylist.uniq.each do |i|
    io.puts <<EOF
    /**
     * @internal
     */
    protected static function _toArray#{i}($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_to#{i}($y); }, $x); }
    /**
     * @internal
     */
    protected static function _fromArray#{i}($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_from#{i}($y); }, $x); }
    /**
     * @internal
     */
    protected static function _checkArray#{i}($x) { if(is_null($x)) return true; return is_array($x) && count(array_filter($x, function($y) { return !self::_check#{i}($y); })) == 0; }
    
EOF
  end
  
  io.puts <<EOF
  
    /**
     * @internal
     */
    abstract public function toArray();
}
EOF
end
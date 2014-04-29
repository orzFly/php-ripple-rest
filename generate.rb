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
  
  io.puts <<EOF
<?php
class RippleRest#{key} extends RippleRestObject {
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
    
    protected $__data = array();
    
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

    public function __isset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            return true;
        }
        return isset($this->__data[$name]);
    }

    public function __unset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "set" . self::$__properties[strtolower($name)];
            return $this->$key(null);
        }
        unset($this->__data[$name]);
    }
    
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
EOF

  to_array = StringIO.new
  # io.puts "  # #{json["description"]}"
  json["properties"].each do |k, v|
    type = ""
    typeobj = to = from = check = nil
    if v["type"] == "string" && v["pattern"]
      type = "[String] +#{v["pattern"].inspect}+"
      typeobj = [:String, v["pattern"]]
    elsif v["type"] == "string"
      type = "[String]"
      typeobj = :String
    elsif v["type"] == "boolean"
      type = "[Boolean]"
      typeobj = :Boolean
    elsif v["type"] == "array"
      type = "[Array<#{v["items"]["$ref"]}>]"
      typeobj = :"Array#{v["items"]["$ref"]}"
      arraylist << v["items"]["$ref"]
    elsif v["type"] == "float"
      type = "[Float]"
      typeobj = :Float
    elsif v["$ref"] && (!schemas[v["$ref"]] || schemas[v["$ref"]]["type"] == "string")
      type = "[String<#{v["$ref"]}>]"
      typeobj = v["$ref"].to_sym
    elsif v["$ref"]
      type = "[#{v["$ref"]}]"
      typeobj = v["$ref"].to_sym
    elsif
      raise "Unsupported type"
    end
    
    if typeobj.is_a? Symbol
      to = lambda { |x| "self::_to#{typeobj}(#{x})" }
      from = lambda { |x| "self::_from#{typeobj}(#{x})" }
      check = lambda { |x| "self::_check#{typeobj}(#{x})" }
    elsif typeobj.is_a?(Array) && typeobj[0] == :String
      to = lambda { |x| "self::_toStringPattern(#{x}, #{typeobj[1].inspect})" }
      from = lambda { |x| "self::_fromStringPattern(#{x}, #{typeobj[1].inspect})" }
      check = lambda { |x| "self::_checkStringPattern(#{x}, #{typeobj[1].inspect})" }
    end
    
    #io.puts "    # @!attribute #{k}"
    #io.puts "    #   #{v["description"]}"
    #io.puts "    #   @return #{type}"
    io.puts <<EOF
    
    protected $_#{k.camel_case};
    
    public function get#{k.camel_case}() {
        return $this->_#{k.camel_case};
    }
    
    public function set#{k.camel_case}($value) {
        try {
            if (!#{check.("$value")}) throw new Exception("");
            $this->_#{k.camel_case} = #{from.("$value")};
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . #{type.inspect});
        }
    }
    
    private function init#{k.camel_case}($value) {
        $this->_#{k.camel_case} = #{from.("$value")};
    }
EOF
    #io.puts "    required #{k.to_sym.inspect}" if (json["required"] || []).include?(k)
    #io.puts
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

abstract class RippleRestObject {
    protected static function _toString($x) { if(is_null($x)) return null; return (string) $x; }
    protected static function _fromString($x) { if(is_null($x)) return null; return (string) $x; }
    protected static function _checkString($x) { if(is_null($x)) return true; return true; }
    
    protected static function _toStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    protected static function _fromStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    protected static function _checkStringPattern($x, $pattern) { if(is_null($x)) return true; return (bool) preg_match((string) $x, '`' . $pattern .'`'); }
    
    protected static function _toBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    protected static function _fromBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    protected static function _checkBoolean($x) { if(is_null($x)) return true; return true; }
    
    protected static function _toFloat($x) { if(is_null($x)) return null; return (float) $x; }
    protected static function _fromFloat($x) { if(is_null($x)) return null; return (float) $x; }
    protected static function _checkFloat($x) { if(is_null($x)) return true; return true; }

EOF

  schemas.values.select{|i|i["type"] == "string"}.each do |json|
    key = json["title"].to_sym
    
    io.puts <<EOF
    protected static function _to#{key}($x) { if(is_null($x)) return null; return self::_toStringPattern($x, #{json["pattern"].inspect}); }
    protected static function _from#{key}($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, #{json["pattern"].inspect}); }
    protected static function _check#{key}($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, #{json["pattern"].inspect}); }
    
EOF
  end

  schemas.values.select{|i|i["type"] == "object"}.each do |json|
    key = json["title"]
    io.puts <<EOF
    protected static function _to#{key}($x) { if(is_null($x)) return null; return $x->toArray(); }
    protected static function _from#{key}($x) { if(is_null($x)) return null; return ($x instanceof RippleRest#{key}) ? $x : new RippleRest#{key}($x); }
    protected static function _check#{key}($x) { if(is_null($x)) return true; return ($x instanceof RippleRest#{key}); }
    
EOF
  end
  
  arraylist.uniq.each do |i|
    io.puts <<EOF
    protected static function _toArray#{i}($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_to#{i}($y); }, $x); }
    protected static function _fromArray#{i}($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_from#{i}($y); }, $x); }
    protected static function _checkArray#{i}($x) { if(is_null($x)) return true; return is_array($x) && count(array_filter($x, function($y) { return !self::_check#{i}($y); })) == 0; }
    
EOF
  end
  
  io.puts <<EOF
}
EOF
end
<?php
class RippleRestBalance extends RippleRestObject {
    protected static $__properties = array(
        "value" => "Value", 
        "value" => "Value", 
        "currency" => "Currency", 
        "currency" => "Currency", 
        "counterparty" => "Counterparty", 
        "counterparty" => "Counterparty"
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
    
    protected $_Value;
    
    public function getValue() {
        return $this->_Value;
    }
    
    public function setValue($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_Value = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String]");
        }
    }
    
    private function initValue($value) {
        $this->_Value = self::_fromString($value);
    }
    
    protected $_Currency;
    
    public function getCurrency() {
        return $this->_Currency;
    }
    
    public function setCurrency($value) {
        try {
            if (!self::_checkCurrency($value)) throw new Exception("");
            $this->_Currency = self::_fromCurrency($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Currency>]");
        }
    }
    
    private function initCurrency($value) {
        $this->_Currency = self::_fromCurrency($value);
    }
    
    protected $_Counterparty;
    
    public function getCounterparty() {
        return $this->_Counterparty;
    }
    
    public function setCounterparty($value) {
        try {
            if (!self::_checkStringPattern($value, "^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$")) throw new Exception("");
            $this->_Counterparty = self::_fromStringPattern($value, "^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$\"+");
        }
    }
    
    private function initCounterparty($value) {
        $this->_Counterparty = self::_fromStringPattern($value, "^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$");
    }
  
    public function toArray()
    {
        $array = array();
    
        $array["value"] = self::_toString($this->_Value);
        if (is_null($array["value"]))
            throw new Exception("Field Value is required in RippleRestBalance");
    
        $array["currency"] = self::_toCurrency($this->_Currency);
        if (is_null($array["currency"]))
            throw new Exception("Field Currency is required in RippleRestBalance");
    
        $array["counterparty"] = self::_toStringPattern($this->_Counterparty, "^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$");
        if (is_null($array["counterparty"])) unset($array["counterparty"]);

        return $array;
    }
}

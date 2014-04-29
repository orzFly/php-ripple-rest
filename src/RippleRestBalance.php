<?php
/**
 * Contains class RippleRestBalance
 *
 * @license MIT
 */


/**
 * A simplified representation of an account Balance
 * @property string $value The quantity of the currency, denoted as a string to retain floating point precision
 * @property string $currency (Currency) The currency expressed as a three-character code
 * @property string $counterparty (`/^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$/`) The Ripple account address of the currency's issuer or gateway, or an empty string if the currency is XRP

 */
class RippleRestBalance extends RippleRestObject {
    /**
     * @internal
     */
    protected static $__properties = array(
        "value" => "Value", 
        "currency" => "Currency", 
        "counterparty" => "Counterparty"
    );
    
    /**
     * Pattern Rule for field `RippleRestBalance::$counterparty`
     * @see RippleRestBalance::$counterparty
     * @see RippleRestBalance::setCounterparty
     * @see RippleRestBalance::getCounterparty
     */
    const PATTERN_COUNTERPARTY = "^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$";
    

    
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
     * Create a new instance of RippleRestBalance.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRestBalance
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
    
    
    /**
     * @internal
     */
    protected $_Value;
    
    /**
     * The quantity of the currency, denoted as a string to retain floating point precision
     * @see RippleRestBalance::$value
     * @see RippleRestBalance::setValue
     * @return string 
     */
    public function getValue() {
        return $this->_Value;
    }
    
    /**
     * The quantity of the currency, denoted as a string to retain floating point precision
     * @see RippleRestBalance::$value
     * @see RippleRestBalance::getValue
     * @param string $value 
     * @return null
     */
    public function setValue($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_Value = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initValue($value) {
        $this->_Value = self::_fromString($value);
    }
    
    /**
     * @internal
     */
    protected $_Currency;
    
    /**
     * The currency expressed as a three-character code
     * @see RippleRestBalance::$currency
     * @see RippleRestBalance::setCurrency
     * @return string (Currency) 
     */
    public function getCurrency() {
        return $this->_Currency;
    }
    
    /**
     * The currency expressed as a three-character code
     * @see RippleRestBalance::$currency
     * @see RippleRestBalance::getCurrency
     * @param string $value (Currency) 
     * @return null
     */
    public function setCurrency($value) {
        try {
            if (!self::_checkCurrency($value)) throw new Exception("");
            $this->_Currency = self::_fromCurrency($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initCurrency($value) {
        $this->_Currency = self::_fromCurrency($value);
    }
    
    /**
     * @internal
     */
    protected $_Counterparty;
    
    /**
     * The Ripple account address of the currency's issuer or gateway, or an empty string if the currency is XRP
     * @see RippleRestBalance::$counterparty
     * @see RippleRestBalance::setCounterparty
     * @return string (`/^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$/`) 
     */
    public function getCounterparty() {
        return $this->_Counterparty;
    }
    
    /**
     * The Ripple account address of the currency's issuer or gateway, or an empty string if the currency is XRP
     * @see RippleRestBalance::$counterparty
     * @see RippleRestBalance::getCounterparty
     * @param string $value (`/^$|^r[1-9A-HJ-NP-Za-km-z]{25,33}$/`) 
     * @return null
     */
    public function setCounterparty($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_COUNTERPARTY)) throw new Exception("");
            $this->_Counterparty = self::_fromStringPattern($value, self::PATTERN_COUNTERPARTY);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initCounterparty($value) {
        $this->_Counterparty = self::_fromStringPattern($value, self::PATTERN_COUNTERPARTY);
    }


    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
    public function toArray()
    {
        $array = array();
    
        $array["value"] = self::_toString($this->_Value);
        if (is_null($array["value"]))
            throw new Exception("Field Value is required in RippleRestBalance");
    
        $array["currency"] = self::_toCurrency($this->_Currency);
        if (is_null($array["currency"]))
            throw new Exception("Field Currency is required in RippleRestBalance");
    
        $array["counterparty"] = self::_toStringPattern($this->_Counterparty, self::PATTERN_COUNTERPARTY);
        if (is_null($array["counterparty"])) unset($array["counterparty"]);

        return $array;
    }
}

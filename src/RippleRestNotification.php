<?php
class RippleRestNotification extends RippleRestObject {
    protected static $__properties = array(
        "account" => "Account", 
        "account" => "Account", 
        "type" => "Type", 
        "type" => "Type", 
        "direction" => "Direction", 
        "direction" => "Direction", 
        "state" => "State", 
        "state" => "State", 
        "result" => "Result", 
        "result" => "Result", 
        "ledger" => "Ledger", 
        "ledger" => "Ledger", 
        "hash" => "Hash", 
        "hash" => "Hash", 
        "timestamp" => "Timestamp", 
        "timestamp" => "Timestamp", 
        "transaction_url" => "TransactionUrl", 
        "transactionurl" => "TransactionUrl", 
        "previous_notification_url" => "PreviousNotificationUrl", 
        "previousnotificationurl" => "PreviousNotificationUrl", 
        "next_notification_url" => "NextNotificationUrl", 
        "nextnotificationurl" => "NextNotificationUrl"
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
    
    protected $_Account;
    
    public function getAccount() {
        return $this->_Account;
    }
    
    public function setAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_Account = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<RippleAddress>]");
        }
    }
    
    private function initAccount($value) {
        $this->_Account = self::_fromRippleAddress($value);
    }
    
    protected $_Type;
    
    public function getType() {
        return $this->_Type;
    }
    
    public function setType($value) {
        try {
            if (!self::_checkStringPattern($value, "^payment|order|trustline|accountsettings$")) throw new Exception("");
            $this->_Type = self::_fromStringPattern($value, "^payment|order|trustline|accountsettings$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^payment|order|trustline|accountsettings$\"+");
        }
    }
    
    private function initType($value) {
        $this->_Type = self::_fromStringPattern($value, "^payment|order|trustline|accountsettings$");
    }
    
    protected $_Direction;
    
    public function getDirection() {
        return $this->_Direction;
    }
    
    public function setDirection($value) {
        try {
            if (!self::_checkStringPattern($value, "^incoming|outgoing|passthrough$")) throw new Exception("");
            $this->_Direction = self::_fromStringPattern($value, "^incoming|outgoing|passthrough$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^incoming|outgoing|passthrough$\"+");
        }
    }
    
    private function initDirection($value) {
        $this->_Direction = self::_fromStringPattern($value, "^incoming|outgoing|passthrough$");
    }
    
    protected $_State;
    
    public function getState() {
        return $this->_State;
    }
    
    public function setState($value) {
        try {
            if (!self::_checkStringPattern($value, "^validated|failed$")) throw new Exception("");
            $this->_State = self::_fromStringPattern($value, "^validated|failed$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^validated|failed$\"+");
        }
    }
    
    private function initState($value) {
        $this->_State = self::_fromStringPattern($value, "^validated|failed$");
    }
    
    protected $_Result;
    
    public function getResult() {
        return $this->_Result;
    }
    
    public function setResult($value) {
        try {
            if (!self::_checkStringPattern($value, "te[cfjlms][A-Za-z_]+")) throw new Exception("");
            $this->_Result = self::_fromStringPattern($value, "te[cfjlms][A-Za-z_]+");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"te[cfjlms][A-Za-z_]+\"+");
        }
    }
    
    private function initResult($value) {
        $this->_Result = self::_fromStringPattern($value, "te[cfjlms][A-Za-z_]+");
    }
    
    protected $_Ledger;
    
    public function getLedger() {
        return $this->_Ledger;
    }
    
    public function setLedger($value) {
        try {
            if (!self::_checkStringPattern($value, "^[0-9]+$")) throw new Exception("");
            $this->_Ledger = self::_fromStringPattern($value, "^[0-9]+$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^[0-9]+$\"+");
        }
    }
    
    private function initLedger($value) {
        $this->_Ledger = self::_fromStringPattern($value, "^[0-9]+$");
    }
    
    protected $_Hash;
    
    public function getHash() {
        return $this->_Hash;
    }
    
    public function setHash($value) {
        try {
            if (!self::_checkHash256($value)) throw new Exception("");
            $this->_Hash = self::_fromHash256($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Hash256>]");
        }
    }
    
    private function initHash($value) {
        $this->_Hash = self::_fromHash256($value);
    }
    
    protected $_Timestamp;
    
    public function getTimestamp() {
        return $this->_Timestamp;
    }
    
    public function setTimestamp($value) {
        try {
            if (!self::_checkTimestamp($value)) throw new Exception("");
            $this->_Timestamp = self::_fromTimestamp($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Timestamp>]");
        }
    }
    
    private function initTimestamp($value) {
        $this->_Timestamp = self::_fromTimestamp($value);
    }
    
    protected $_TransactionUrl;
    
    public function getTransactionUrl() {
        return $this->_TransactionUrl;
    }
    
    public function setTransactionUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_TransactionUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String]");
        }
    }
    
    private function initTransactionUrl($value) {
        $this->_TransactionUrl = self::_fromString($value);
    }
    
    protected $_PreviousNotificationUrl;
    
    public function getPreviousNotificationUrl() {
        return $this->_PreviousNotificationUrl;
    }
    
    public function setPreviousNotificationUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_PreviousNotificationUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String]");
        }
    }
    
    private function initPreviousNotificationUrl($value) {
        $this->_PreviousNotificationUrl = self::_fromString($value);
    }
    
    protected $_NextNotificationUrl;
    
    public function getNextNotificationUrl() {
        return $this->_NextNotificationUrl;
    }
    
    public function setNextNotificationUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_NextNotificationUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String]");
        }
    }
    
    private function initNextNotificationUrl($value) {
        $this->_NextNotificationUrl = self::_fromString($value);
    }
  
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"])) unset($array["account"]);
    
        $array["type"] = self::_toStringPattern($this->_Type, "^payment|order|trustline|accountsettings$");
        if (is_null($array["type"])) unset($array["type"]);
    
        $array["direction"] = self::_toStringPattern($this->_Direction, "^incoming|outgoing|passthrough$");
        if (is_null($array["direction"])) unset($array["direction"]);
    
        $array["state"] = self::_toStringPattern($this->_State, "^validated|failed$");
        if (is_null($array["state"])) unset($array["state"]);
    
        $array["result"] = self::_toStringPattern($this->_Result, "te[cfjlms][A-Za-z_]+");
        if (is_null($array["result"])) unset($array["result"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, "^[0-9]+$");
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);
    
        $array["timestamp"] = self::_toTimestamp($this->_Timestamp);
        if (is_null($array["timestamp"])) unset($array["timestamp"]);
    
        $array["transaction_url"] = self::_toString($this->_TransactionUrl);
        if (is_null($array["transaction_url"])) unset($array["transaction_url"]);
    
        $array["previous_notification_url"] = self::_toString($this->_PreviousNotificationUrl);
        if (is_null($array["previous_notification_url"])) unset($array["previous_notification_url"]);
    
        $array["next_notification_url"] = self::_toString($this->_NextNotificationUrl);
        if (is_null($array["next_notification_url"])) unset($array["next_notification_url"]);

        return $array;
    }
}

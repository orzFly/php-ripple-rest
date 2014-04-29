<?php
/**
 * Contains class RippleRestNotification
 *
 * @license MIT
 */


/**
 * A 
 * @property string $account (RippleAddress) The Ripple address of the account to which the notification pertains
 * @property string $type (`/^payment|order|trustline|accountsettings$/`) The resource type this notification corresponds to. Possible values are "payment", "order", "trustline", "accountsettings"
 * @property string $direction (`/^incoming|outgoing|passthrough$/`) The direction of the transaction, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
 * @property string $state (`/^validated|failed$/`) The state of the transaction from the perspective of the Ripple Ledger. Possible values are "validated" and "failed"
 * @property string $result (`/te[cfjlms][A-Za-z_]+/`) The rippled code indicating the success or failure type of the transaction. The code "tesSUCCESS" indicates that the transaction was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
 * @property string $ledger (`/^[0-9]+$/`) The string representation of the index number of the ledger containing the validated or failed transaction. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
 * @property string $hash (Hash256) The 256-bit hash of the transaction. This is used throughout the Ripple protocol as the unique identifier for the transaction
 * @property string $timestamp (Timestamp) The timestamp representing when the transaction was validated and written into the Ripple ledger
 * @property string $transactionUrl A URL that can be used to fetch the full resource this notification corresponds to
 * @property string $previousNotificationUrl A URL that can be used to fetch the notification that preceded this one chronologically
 * @property string $nextNotificationUrl A URL that can be used to fetch the notification that followed this one chronologically

 */
class RippleRestNotification extends RippleRestObject {
    /**
     * @internal
     */
    protected static $__properties = array(
        "account" => "Account", 
        "type" => "Type", 
        "direction" => "Direction", 
        "state" => "State", 
        "result" => "Result", 
        "ledger" => "Ledger", 
        "hash" => "Hash", 
        "timestamp" => "Timestamp", 
        "transaction_url" => "TransactionUrl", 
        "transactionurl" => "TransactionUrl", 
        "previous_notification_url" => "PreviousNotificationUrl", 
        "previousnotificationurl" => "PreviousNotificationUrl", 
        "next_notification_url" => "NextNotificationUrl", 
        "nextnotificationurl" => "NextNotificationUrl"
    );
    
    /**
     * Pattern Rule for field `RippleRestNotification::$type`
     * @see RippleRestNotification::$type
     * @see RippleRestNotification::setType
     * @see RippleRestNotification::getType
     */
    const PATTERN_TYPE = "^payment|order|trustline|accountsettings$";
    
    /**
     * Pattern Rule for field `RippleRestNotification::$direction`
     * @see RippleRestNotification::$direction
     * @see RippleRestNotification::setDirection
     * @see RippleRestNotification::getDirection
     */
    const PATTERN_DIRECTION = "^incoming|outgoing|passthrough$";
    
    /**
     * Pattern Rule for field `RippleRestNotification::$state`
     * @see RippleRestNotification::$state
     * @see RippleRestNotification::setState
     * @see RippleRestNotification::getState
     */
    const PATTERN_STATE = "^validated|failed$";
    
    /**
     * Pattern Rule for field `RippleRestNotification::$result`
     * @see RippleRestNotification::$result
     * @see RippleRestNotification::setResult
     * @see RippleRestNotification::getResult
     */
    const PATTERN_RESULT = "te[cfjlms][A-Za-z_]+";
    
    /**
     * Pattern Rule for field `RippleRestNotification::$ledger`
     * @see RippleRestNotification::$ledger
     * @see RippleRestNotification::setLedger
     * @see RippleRestNotification::getLedger
     */
    const PATTERN_LEDGER = "^[0-9]+$";
    

    
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
     * Create a new instance of RippleRestNotification.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRestNotification
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
    protected $_Account;
    
    /**
     * The Ripple address of the account to which the notification pertains
     * @see RippleRestNotification::$account
     * @see RippleRestNotification::setAccount
     * @return string (RippleAddress) 
     */
    public function getAccount() {
        return $this->_Account;
    }
    
    /**
     * The Ripple address of the account to which the notification pertains
     * @see RippleRestNotification::$account
     * @see RippleRestNotification::getAccount
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_Account = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initAccount($value) {
        $this->_Account = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_Type;
    
    /**
     * The resource type this notification corresponds to. Possible values are "payment", "order", "trustline", "accountsettings"
     * @see RippleRestNotification::$type
     * @see RippleRestNotification::setType
     * @return string (`/^payment|order|trustline|accountsettings$/`) 
     */
    public function getType() {
        return $this->_Type;
    }
    
    /**
     * The resource type this notification corresponds to. Possible values are "payment", "order", "trustline", "accountsettings"
     * @see RippleRestNotification::$type
     * @see RippleRestNotification::getType
     * @param string $value (`/^payment|order|trustline|accountsettings$/`) 
     * @return null
     */
    public function setType($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_TYPE)) throw new Exception("");
            $this->_Type = self::_fromStringPattern($value, self::PATTERN_TYPE);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initType($value) {
        $this->_Type = self::_fromStringPattern($value, self::PATTERN_TYPE);
    }
    
    /**
     * @internal
     */
    protected $_Direction;
    
    /**
     * The direction of the transaction, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
     * @see RippleRestNotification::$direction
     * @see RippleRestNotification::setDirection
     * @return string (`/^incoming|outgoing|passthrough$/`) 
     */
    public function getDirection() {
        return $this->_Direction;
    }
    
    /**
     * The direction of the transaction, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
     * @see RippleRestNotification::$direction
     * @see RippleRestNotification::getDirection
     * @param string $value (`/^incoming|outgoing|passthrough$/`) 
     * @return null
     */
    public function setDirection($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_DIRECTION)) throw new Exception("");
            $this->_Direction = self::_fromStringPattern($value, self::PATTERN_DIRECTION);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initDirection($value) {
        $this->_Direction = self::_fromStringPattern($value, self::PATTERN_DIRECTION);
    }
    
    /**
     * @internal
     */
    protected $_State;
    
    /**
     * The state of the transaction from the perspective of the Ripple Ledger. Possible values are "validated" and "failed"
     * @see RippleRestNotification::$state
     * @see RippleRestNotification::setState
     * @return string (`/^validated|failed$/`) 
     */
    public function getState() {
        return $this->_State;
    }
    
    /**
     * The state of the transaction from the perspective of the Ripple Ledger. Possible values are "validated" and "failed"
     * @see RippleRestNotification::$state
     * @see RippleRestNotification::getState
     * @param string $value (`/^validated|failed$/`) 
     * @return null
     */
    public function setState($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_STATE)) throw new Exception("");
            $this->_State = self::_fromStringPattern($value, self::PATTERN_STATE);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initState($value) {
        $this->_State = self::_fromStringPattern($value, self::PATTERN_STATE);
    }
    
    /**
     * @internal
     */
    protected $_Result;
    
    /**
     * The rippled code indicating the success or failure type of the transaction. The code "tesSUCCESS" indicates that the transaction was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
     * @see RippleRestNotification::$result
     * @see RippleRestNotification::setResult
     * @return string (`/te[cfjlms][A-Za-z_]+/`) 
     */
    public function getResult() {
        return $this->_Result;
    }
    
    /**
     * The rippled code indicating the success or failure type of the transaction. The code "tesSUCCESS" indicates that the transaction was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
     * @see RippleRestNotification::$result
     * @see RippleRestNotification::getResult
     * @param string $value (`/te[cfjlms][A-Za-z_]+/`) 
     * @return null
     */
    public function setResult($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_RESULT)) throw new Exception("");
            $this->_Result = self::_fromStringPattern($value, self::PATTERN_RESULT);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initResult($value) {
        $this->_Result = self::_fromStringPattern($value, self::PATTERN_RESULT);
    }
    
    /**
     * @internal
     */
    protected $_Ledger;
    
    /**
     * The string representation of the index number of the ledger containing the validated or failed transaction. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
     * @see RippleRestNotification::$ledger
     * @see RippleRestNotification::setLedger
     * @return string (`/^[0-9]+$/`) 
     */
    public function getLedger() {
        return $this->_Ledger;
    }
    
    /**
     * The string representation of the index number of the ledger containing the validated or failed transaction. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
     * @see RippleRestNotification::$ledger
     * @see RippleRestNotification::getLedger
     * @param string $value (`/^[0-9]+$/`) 
     * @return null
     */
    public function setLedger($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_LEDGER)) throw new Exception("");
            $this->_Ledger = self::_fromStringPattern($value, self::PATTERN_LEDGER);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initLedger($value) {
        $this->_Ledger = self::_fromStringPattern($value, self::PATTERN_LEDGER);
    }
    
    /**
     * @internal
     */
    protected $_Hash;
    
    /**
     * The 256-bit hash of the transaction. This is used throughout the Ripple protocol as the unique identifier for the transaction
     * @see RippleRestNotification::$hash
     * @see RippleRestNotification::setHash
     * @return string (Hash256) 
     */
    public function getHash() {
        return $this->_Hash;
    }
    
    /**
     * The 256-bit hash of the transaction. This is used throughout the Ripple protocol as the unique identifier for the transaction
     * @see RippleRestNotification::$hash
     * @see RippleRestNotification::getHash
     * @param string $value (Hash256) 
     * @return null
     */
    public function setHash($value) {
        try {
            if (!self::_checkHash256($value)) throw new Exception("");
            $this->_Hash = self::_fromHash256($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initHash($value) {
        $this->_Hash = self::_fromHash256($value);
    }
    
    /**
     * @internal
     */
    protected $_Timestamp;
    
    /**
     * The timestamp representing when the transaction was validated and written into the Ripple ledger
     * @see RippleRestNotification::$timestamp
     * @see RippleRestNotification::setTimestamp
     * @return string (Timestamp) 
     */
    public function getTimestamp() {
        return $this->_Timestamp;
    }
    
    /**
     * The timestamp representing when the transaction was validated and written into the Ripple ledger
     * @see RippleRestNotification::$timestamp
     * @see RippleRestNotification::getTimestamp
     * @param string $value (Timestamp) 
     * @return null
     */
    public function setTimestamp($value) {
        try {
            if (!self::_checkTimestamp($value)) throw new Exception("");
            $this->_Timestamp = self::_fromTimestamp($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initTimestamp($value) {
        $this->_Timestamp = self::_fromTimestamp($value);
    }
    
    /**
     * @internal
     */
    protected $_TransactionUrl;
    
    /**
     * A URL that can be used to fetch the full resource this notification corresponds to
     * @see RippleRestNotification::$transactionUrl
     * @see RippleRestNotification::setTransactionUrl
     * @return string 
     */
    public function getTransactionUrl() {
        return $this->_TransactionUrl;
    }
    
    /**
     * A URL that can be used to fetch the full resource this notification corresponds to
     * @see RippleRestNotification::$transactionUrl
     * @see RippleRestNotification::getTransactionUrl
     * @param string $value 
     * @return null
     */
    public function setTransactionUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_TransactionUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initTransactionUrl($value) {
        $this->_TransactionUrl = self::_fromString($value);
    }
    
    /**
     * @internal
     */
    protected $_PreviousNotificationUrl;
    
    /**
     * A URL that can be used to fetch the notification that preceded this one chronologically
     * @see RippleRestNotification::$previousNotificationUrl
     * @see RippleRestNotification::setPreviousNotificationUrl
     * @return string 
     */
    public function getPreviousNotificationUrl() {
        return $this->_PreviousNotificationUrl;
    }
    
    /**
     * A URL that can be used to fetch the notification that preceded this one chronologically
     * @see RippleRestNotification::$previousNotificationUrl
     * @see RippleRestNotification::getPreviousNotificationUrl
     * @param string $value 
     * @return null
     */
    public function setPreviousNotificationUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_PreviousNotificationUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initPreviousNotificationUrl($value) {
        $this->_PreviousNotificationUrl = self::_fromString($value);
    }
    
    /**
     * @internal
     */
    protected $_NextNotificationUrl;
    
    /**
     * A URL that can be used to fetch the notification that followed this one chronologically
     * @see RippleRestNotification::$nextNotificationUrl
     * @see RippleRestNotification::setNextNotificationUrl
     * @return string 
     */
    public function getNextNotificationUrl() {
        return $this->_NextNotificationUrl;
    }
    
    /**
     * A URL that can be used to fetch the notification that followed this one chronologically
     * @see RippleRestNotification::$nextNotificationUrl
     * @see RippleRestNotification::getNextNotificationUrl
     * @param string $value 
     * @return null
     */
    public function setNextNotificationUrl($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_NextNotificationUrl = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initNextNotificationUrl($value) {
        $this->_NextNotificationUrl = self::_fromString($value);
    }


    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"])) unset($array["account"]);
    
        $array["type"] = self::_toStringPattern($this->_Type, self::PATTERN_TYPE);
        if (is_null($array["type"])) unset($array["type"]);
    
        $array["direction"] = self::_toStringPattern($this->_Direction, self::PATTERN_DIRECTION);
        if (is_null($array["direction"])) unset($array["direction"]);
    
        $array["state"] = self::_toStringPattern($this->_State, self::PATTERN_STATE);
        if (is_null($array["state"])) unset($array["state"]);
    
        $array["result"] = self::_toStringPattern($this->_Result, self::PATTERN_RESULT);
        if (is_null($array["result"])) unset($array["result"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, self::PATTERN_LEDGER);
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

<?php
class RippleRestAccountSettings extends RippleRestObject {
    protected static $__properties = array(
        "account" => "Account", 
        "account" => "Account", 
        "regular_key" => "RegularKey", 
        "regularkey" => "RegularKey", 
        "url" => "Url", 
        "url" => "Url", 
        "email_hash" => "EmailHash", 
        "emailhash" => "EmailHash", 
        "message_key" => "MessageKey", 
        "messagekey" => "MessageKey", 
        "transfer_rate" => "TransferRate", 
        "transferrate" => "TransferRate", 
        "require_destination_tag" => "RequireDestinationTag", 
        "requiredestinationtag" => "RequireDestinationTag", 
        "require_authorization" => "RequireAuthorization", 
        "requireauthorization" => "RequireAuthorization", 
        "disallow_xrp" => "DisallowXrp", 
        "disallowxrp" => "DisallowXrp", 
        "transaction_sequence" => "TransactionSequence", 
        "transactionsequence" => "TransactionSequence", 
        "trustline_count" => "TrustlineCount", 
        "trustlinecount" => "TrustlineCount", 
        "ledger" => "Ledger", 
        "ledger" => "Ledger", 
        "hash" => "Hash", 
        "hash" => "Hash"
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
    
    protected $_RegularKey;
    
    public function getRegularKey() {
        return $this->_RegularKey;
    }
    
    public function setRegularKey($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_RegularKey = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<RippleAddress>]");
        }
    }
    
    private function initRegularKey($value) {
        $this->_RegularKey = self::_fromRippleAddress($value);
    }
    
    protected $_Url;
    
    public function getUrl() {
        return $this->_Url;
    }
    
    public function setUrl($value) {
        try {
            if (!self::_checkURL($value)) throw new Exception("");
            $this->_Url = self::_fromURL($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<URL>]");
        }
    }
    
    private function initUrl($value) {
        $this->_Url = self::_fromURL($value);
    }
    
    protected $_EmailHash;
    
    public function getEmailHash() {
        return $this->_EmailHash;
    }
    
    public function setEmailHash($value) {
        try {
            if (!self::_checkHash128($value)) throw new Exception("");
            $this->_EmailHash = self::_fromHash128($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Hash128>]");
        }
    }
    
    private function initEmailHash($value) {
        $this->_EmailHash = self::_fromHash128($value);
    }
    
    protected $_MessageKey;
    
    public function getMessageKey() {
        return $this->_MessageKey;
    }
    
    public function setMessageKey($value) {
        try {
            if (!self::_checkStringPattern($value, "^([0-9a-fA-F]{2}){0,33}$")) throw new Exception("");
            $this->_MessageKey = self::_fromStringPattern($value, "^([0-9a-fA-F]{2}){0,33}$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^([0-9a-fA-F]{2}){0,33}$\"+");
        }
    }
    
    private function initMessageKey($value) {
        $this->_MessageKey = self::_fromStringPattern($value, "^([0-9a-fA-F]{2}){0,33}$");
    }
    
    protected $_TransferRate;
    
    public function getTransferRate() {
        return $this->_TransferRate;
    }
    
    public function setTransferRate($value) {
        try {
            if (!self::_checkFloat($value)) throw new Exception("");
            $this->_TransferRate = self::_fromFloat($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Float]");
        }
    }
    
    private function initTransferRate($value) {
        $this->_TransferRate = self::_fromFloat($value);
    }
    
    protected $_RequireDestinationTag;
    
    public function getRequireDestinationTag() {
        return $this->_RequireDestinationTag;
    }
    
    public function setRequireDestinationTag($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_RequireDestinationTag = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initRequireDestinationTag($value) {
        $this->_RequireDestinationTag = self::_fromBoolean($value);
    }
    
    protected $_RequireAuthorization;
    
    public function getRequireAuthorization() {
        return $this->_RequireAuthorization;
    }
    
    public function setRequireAuthorization($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_RequireAuthorization = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initRequireAuthorization($value) {
        $this->_RequireAuthorization = self::_fromBoolean($value);
    }
    
    protected $_DisallowXrp;
    
    public function getDisallowXrp() {
        return $this->_DisallowXrp;
    }
    
    public function setDisallowXrp($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_DisallowXrp = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initDisallowXrp($value) {
        $this->_DisallowXrp = self::_fromBoolean($value);
    }
    
    protected $_TransactionSequence;
    
    public function getTransactionSequence() {
        return $this->_TransactionSequence;
    }
    
    public function setTransactionSequence($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_TransactionSequence = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<UINT32>]");
        }
    }
    
    private function initTransactionSequence($value) {
        $this->_TransactionSequence = self::_fromUINT32($value);
    }
    
    protected $_TrustlineCount;
    
    public function getTrustlineCount() {
        return $this->_TrustlineCount;
    }
    
    public function setTrustlineCount($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_TrustlineCount = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<UINT32>]");
        }
    }
    
    private function initTrustlineCount($value) {
        $this->_TrustlineCount = self::_fromUINT32($value);
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
  
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"]))
            throw new Exception("Field Account is required in RippleRestAccountSettings");
    
        $array["regular_key"] = self::_toRippleAddress($this->_RegularKey);
        if (is_null($array["regular_key"])) unset($array["regular_key"]);
    
        $array["url"] = self::_toURL($this->_Url);
        if (is_null($array["url"])) unset($array["url"]);
    
        $array["email_hash"] = self::_toHash128($this->_EmailHash);
        if (is_null($array["email_hash"])) unset($array["email_hash"]);
    
        $array["message_key"] = self::_toStringPattern($this->_MessageKey, "^([0-9a-fA-F]{2}){0,33}$");
        if (is_null($array["message_key"])) unset($array["message_key"]);
    
        $array["transfer_rate"] = self::_toFloat($this->_TransferRate);
        if (is_null($array["transfer_rate"])) unset($array["transfer_rate"]);
    
        $array["require_destination_tag"] = self::_toBoolean($this->_RequireDestinationTag);
        if (is_null($array["require_destination_tag"])) unset($array["require_destination_tag"]);
    
        $array["require_authorization"] = self::_toBoolean($this->_RequireAuthorization);
        if (is_null($array["require_authorization"])) unset($array["require_authorization"]);
    
        $array["disallow_xrp"] = self::_toBoolean($this->_DisallowXrp);
        if (is_null($array["disallow_xrp"])) unset($array["disallow_xrp"]);
    
        $array["transaction_sequence"] = self::_toUINT32($this->_TransactionSequence);
        if (is_null($array["transaction_sequence"])) unset($array["transaction_sequence"]);
    
        $array["trustline_count"] = self::_toUINT32($this->_TrustlineCount);
        if (is_null($array["trustline_count"])) unset($array["trustline_count"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, "^[0-9]+$");
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);

        return $array;
    }
}

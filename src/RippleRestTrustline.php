<?php
class RippleRestTrustline extends RippleRestObject {
    protected static $__properties = array(
        "account" => "Account", 
        "account" => "Account", 
        "counterparty" => "Counterparty", 
        "counterparty" => "Counterparty", 
        "currency" => "Currency", 
        "currency" => "Currency", 
        "limit" => "Limit", 
        "limit" => "Limit", 
        "reciprocated_limit" => "ReciprocatedLimit", 
        "reciprocatedlimit" => "ReciprocatedLimit", 
        "authorized_by_account" => "AuthorizedByAccount", 
        "authorizedbyaccount" => "AuthorizedByAccount", 
        "authorized_by_counterparty" => "AuthorizedByCounterparty", 
        "authorizedbycounterparty" => "AuthorizedByCounterparty", 
        "account_allows_rippling" => "AccountAllowsRippling", 
        "accountallowsrippling" => "AccountAllowsRippling", 
        "counterparty_allows_rippling" => "CounterpartyAllowsRippling", 
        "counterpartyallowsrippling" => "CounterpartyAllowsRippling", 
        "ledger" => "Ledger", 
        "ledger" => "Ledger", 
        "hash" => "Hash", 
        "hash" => "Hash", 
        "previous" => "Previous", 
        "previous" => "Previous"
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
    
    protected $_Counterparty;
    
    public function getCounterparty() {
        return $this->_Counterparty;
    }
    
    public function setCounterparty($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_Counterparty = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<RippleAddress>]");
        }
    }
    
    private function initCounterparty($value) {
        $this->_Counterparty = self::_fromRippleAddress($value);
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
    
    protected $_Limit;
    
    public function getLimit() {
        return $this->_Limit;
    }
    
    public function setLimit($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_Limit = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<FloatString>]");
        }
    }
    
    private function initLimit($value) {
        $this->_Limit = self::_fromFloatString($value);
    }
    
    protected $_ReciprocatedLimit;
    
    public function getReciprocatedLimit() {
        return $this->_ReciprocatedLimit;
    }
    
    public function setReciprocatedLimit($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_ReciprocatedLimit = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<FloatString>]");
        }
    }
    
    private function initReciprocatedLimit($value) {
        $this->_ReciprocatedLimit = self::_fromFloatString($value);
    }
    
    protected $_AuthorizedByAccount;
    
    public function getAuthorizedByAccount() {
        return $this->_AuthorizedByAccount;
    }
    
    public function setAuthorizedByAccount($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AuthorizedByAccount = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initAuthorizedByAccount($value) {
        $this->_AuthorizedByAccount = self::_fromBoolean($value);
    }
    
    protected $_AuthorizedByCounterparty;
    
    public function getAuthorizedByCounterparty() {
        return $this->_AuthorizedByCounterparty;
    }
    
    public function setAuthorizedByCounterparty($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AuthorizedByCounterparty = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initAuthorizedByCounterparty($value) {
        $this->_AuthorizedByCounterparty = self::_fromBoolean($value);
    }
    
    protected $_AccountAllowsRippling;
    
    public function getAccountAllowsRippling() {
        return $this->_AccountAllowsRippling;
    }
    
    public function setAccountAllowsRippling($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AccountAllowsRippling = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initAccountAllowsRippling($value) {
        $this->_AccountAllowsRippling = self::_fromBoolean($value);
    }
    
    protected $_CounterpartyAllowsRippling;
    
    public function getCounterpartyAllowsRippling() {
        return $this->_CounterpartyAllowsRippling;
    }
    
    public function setCounterpartyAllowsRippling($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_CounterpartyAllowsRippling = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initCounterpartyAllowsRippling($value) {
        $this->_CounterpartyAllowsRippling = self::_fromBoolean($value);
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
    
    protected $_Previous;
    
    public function getPrevious() {
        return $this->_Previous;
    }
    
    public function setPrevious($value) {
        try {
            if (!self::_checkTrustline($value)) throw new Exception("");
            $this->_Previous = self::_fromTrustline($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Trustline]");
        }
    }
    
    private function initPrevious($value) {
        $this->_Previous = self::_fromTrustline($value);
    }
  
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"]))
            throw new Exception("Field Account is required in RippleRestTrustline");
    
        $array["counterparty"] = self::_toRippleAddress($this->_Counterparty);
        if (is_null($array["counterparty"])) unset($array["counterparty"]);
    
        $array["currency"] = self::_toCurrency($this->_Currency);
        if (is_null($array["currency"])) unset($array["currency"]);
    
        $array["limit"] = self::_toFloatString($this->_Limit);
        if (is_null($array["limit"]))
            throw new Exception("Field Limit is required in RippleRestTrustline");
    
        $array["reciprocated_limit"] = self::_toFloatString($this->_ReciprocatedLimit);
        if (is_null($array["reciprocated_limit"])) unset($array["reciprocated_limit"]);
    
        $array["authorized_by_account"] = self::_toBoolean($this->_AuthorizedByAccount);
        if (is_null($array["authorized_by_account"])) unset($array["authorized_by_account"]);
    
        $array["authorized_by_counterparty"] = self::_toBoolean($this->_AuthorizedByCounterparty);
        if (is_null($array["authorized_by_counterparty"])) unset($array["authorized_by_counterparty"]);
    
        $array["account_allows_rippling"] = self::_toBoolean($this->_AccountAllowsRippling);
        if (is_null($array["account_allows_rippling"])) unset($array["account_allows_rippling"]);
    
        $array["counterparty_allows_rippling"] = self::_toBoolean($this->_CounterpartyAllowsRippling);
        if (is_null($array["counterparty_allows_rippling"])) unset($array["counterparty_allows_rippling"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, "^[0-9]+$");
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);
    
        $array["previous"] = self::_toTrustline($this->_Previous);
        if (is_null($array["previous"])) unset($array["previous"]);

        return $array;
    }
}

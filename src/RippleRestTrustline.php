<?php
/**
 * Contains class RippleRestTrustline
 *
 * @license MIT
 */


/**
 * A simplified Trustline object used by the ripple-rest API
 * @property string $account (RippleAddress) The account from whose perspective this trustline is being viewed
 * @property string $counterparty (RippleAddress) The other party in this trustline
 * @property string $currency (Currency) The code of the currency in which this trustline denotes trust
 * @property string $limit (FloatString) The maximum value of the currency that the account may hold issued by the counterparty
 * @property string $reciprocatedLimit (FloatString) The maximum value of the currency that the counterparty may hold issued by the account
 * @property boolean $authorizedByAccount Set to true if the account has explicitly authorized the counterparty to hold currency it issues. This is only necessary if the account's settings include require_authorization_for_incoming_trustlines
 * @property boolean $authorizedByCounterparty Set to true if the counterparty has explicitly authorized the account to hold currency it issues. This is only necessary if the counterparty's settings include require_authorization_for_incoming_trustlines
 * @property boolean $accountAllowsRippling If true it indicates that the account allows pairwise rippling out through this trustline
 * @property boolean $counterpartyAllowsRippling If true it indicates that the counterparty allows pairwise rippling out through this trustline
 * @property string $ledger (`/^[0-9]+$/`) The string representation of the index number of the ledger containing this trustline or, in the case of historical queries, of the transaction that modified this Trustline
 * @property string $hash (Hash256) If this object was returned by a historical query this value will be the hash of the transaction that modified this Trustline. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction
 * @property RippleRestTrustline $previous If the trustline was changed this will be a full Trustline object representing the previous values. If the previous object also had a previous object that will be removed to reduce data complexity. Trustline changes can be walked backwards by querying the API for previous.hash repeatedly

 */
class RippleRestTrustline extends RippleRestObject {
    /**
     * @internal
     */
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
    
    /**
     * Pattern Rule for field `RippleRestTrustline::$ledger`
     * @see RippleRestTrustline::$ledger
     * @see RippleRestTrustline::setLedger
     * @see RippleRestTrustline::getLedger
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
     * Create a new instance of RippleRestTrustline.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRestTrustline
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
     * The account from whose perspective this trustline is being viewed
     * @see RippleRestTrustline::$account
     * @see RippleRestTrustline::setAccount
     * @return string (RippleAddress) 
     */
    public function getAccount() {
        return $this->_Account;
    }
    
    /**
     * The account from whose perspective this trustline is being viewed
     * @see RippleRestTrustline::$account
     * @see RippleRestTrustline::getAccount
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
    protected $_Counterparty;
    
    /**
     * The other party in this trustline
     * @see RippleRestTrustline::$counterparty
     * @see RippleRestTrustline::setCounterparty
     * @return string (RippleAddress) 
     */
    public function getCounterparty() {
        return $this->_Counterparty;
    }
    
    /**
     * The other party in this trustline
     * @see RippleRestTrustline::$counterparty
     * @see RippleRestTrustline::getCounterparty
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setCounterparty($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_Counterparty = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initCounterparty($value) {
        $this->_Counterparty = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_Currency;
    
    /**
     * The code of the currency in which this trustline denotes trust
     * @see RippleRestTrustline::$currency
     * @see RippleRestTrustline::setCurrency
     * @return string (Currency) 
     */
    public function getCurrency() {
        return $this->_Currency;
    }
    
    /**
     * The code of the currency in which this trustline denotes trust
     * @see RippleRestTrustline::$currency
     * @see RippleRestTrustline::getCurrency
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
    protected $_Limit;
    
    /**
     * The maximum value of the currency that the account may hold issued by the counterparty
     * @see RippleRestTrustline::$limit
     * @see RippleRestTrustline::setLimit
     * @return string (FloatString) 
     */
    public function getLimit() {
        return $this->_Limit;
    }
    
    /**
     * The maximum value of the currency that the account may hold issued by the counterparty
     * @see RippleRestTrustline::$limit
     * @see RippleRestTrustline::getLimit
     * @param string $value (FloatString) 
     * @return null
     */
    public function setLimit($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_Limit = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initLimit($value) {
        $this->_Limit = self::_fromFloatString($value);
    }
    
    /**
     * @internal
     */
    protected $_ReciprocatedLimit;
    
    /**
     * The maximum value of the currency that the counterparty may hold issued by the account
     * @see RippleRestTrustline::$reciprocatedLimit
     * @see RippleRestTrustline::setReciprocatedLimit
     * @return string (FloatString) 
     */
    public function getReciprocatedLimit() {
        return $this->_ReciprocatedLimit;
    }
    
    /**
     * The maximum value of the currency that the counterparty may hold issued by the account
     * @see RippleRestTrustline::$reciprocatedLimit
     * @see RippleRestTrustline::getReciprocatedLimit
     * @param string $value (FloatString) 
     * @return null
     */
    public function setReciprocatedLimit($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_ReciprocatedLimit = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initReciprocatedLimit($value) {
        $this->_ReciprocatedLimit = self::_fromFloatString($value);
    }
    
    /**
     * @internal
     */
    protected $_AuthorizedByAccount;
    
    /**
     * Set to true if the account has explicitly authorized the counterparty to hold currency it issues. This is only necessary if the account's settings include require_authorization_for_incoming_trustlines
     * @see RippleRestTrustline::$authorizedByAccount
     * @see RippleRestTrustline::setAuthorizedByAccount
     * @return boolean 
     */
    public function getAuthorizedByAccount() {
        return $this->_AuthorizedByAccount;
    }
    
    /**
     * Set to true if the account has explicitly authorized the counterparty to hold currency it issues. This is only necessary if the account's settings include require_authorization_for_incoming_trustlines
     * @see RippleRestTrustline::$authorizedByAccount
     * @see RippleRestTrustline::getAuthorizedByAccount
     * @param boolean $value 
     * @return null
     */
    public function setAuthorizedByAccount($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AuthorizedByAccount = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initAuthorizedByAccount($value) {
        $this->_AuthorizedByAccount = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_AuthorizedByCounterparty;
    
    /**
     * Set to true if the counterparty has explicitly authorized the account to hold currency it issues. This is only necessary if the counterparty's settings include require_authorization_for_incoming_trustlines
     * @see RippleRestTrustline::$authorizedByCounterparty
     * @see RippleRestTrustline::setAuthorizedByCounterparty
     * @return boolean 
     */
    public function getAuthorizedByCounterparty() {
        return $this->_AuthorizedByCounterparty;
    }
    
    /**
     * Set to true if the counterparty has explicitly authorized the account to hold currency it issues. This is only necessary if the counterparty's settings include require_authorization_for_incoming_trustlines
     * @see RippleRestTrustline::$authorizedByCounterparty
     * @see RippleRestTrustline::getAuthorizedByCounterparty
     * @param boolean $value 
     * @return null
     */
    public function setAuthorizedByCounterparty($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AuthorizedByCounterparty = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initAuthorizedByCounterparty($value) {
        $this->_AuthorizedByCounterparty = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_AccountAllowsRippling;
    
    /**
     * If true it indicates that the account allows pairwise rippling out through this trustline
     * @see RippleRestTrustline::$accountAllowsRippling
     * @see RippleRestTrustline::setAccountAllowsRippling
     * @return boolean 
     */
    public function getAccountAllowsRippling() {
        return $this->_AccountAllowsRippling;
    }
    
    /**
     * If true it indicates that the account allows pairwise rippling out through this trustline
     * @see RippleRestTrustline::$accountAllowsRippling
     * @see RippleRestTrustline::getAccountAllowsRippling
     * @param boolean $value 
     * @return null
     */
    public function setAccountAllowsRippling($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_AccountAllowsRippling = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initAccountAllowsRippling($value) {
        $this->_AccountAllowsRippling = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_CounterpartyAllowsRippling;
    
    /**
     * If true it indicates that the counterparty allows pairwise rippling out through this trustline
     * @see RippleRestTrustline::$counterpartyAllowsRippling
     * @see RippleRestTrustline::setCounterpartyAllowsRippling
     * @return boolean 
     */
    public function getCounterpartyAllowsRippling() {
        return $this->_CounterpartyAllowsRippling;
    }
    
    /**
     * If true it indicates that the counterparty allows pairwise rippling out through this trustline
     * @see RippleRestTrustline::$counterpartyAllowsRippling
     * @see RippleRestTrustline::getCounterpartyAllowsRippling
     * @param boolean $value 
     * @return null
     */
    public function setCounterpartyAllowsRippling($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_CounterpartyAllowsRippling = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initCounterpartyAllowsRippling($value) {
        $this->_CounterpartyAllowsRippling = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_Ledger;
    
    /**
     * The string representation of the index number of the ledger containing this trustline or, in the case of historical queries, of the transaction that modified this Trustline
     * @see RippleRestTrustline::$ledger
     * @see RippleRestTrustline::setLedger
     * @return string (`/^[0-9]+$/`) 
     */
    public function getLedger() {
        return $this->_Ledger;
    }
    
    /**
     * The string representation of the index number of the ledger containing this trustline or, in the case of historical queries, of the transaction that modified this Trustline
     * @see RippleRestTrustline::$ledger
     * @see RippleRestTrustline::getLedger
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
     * If this object was returned by a historical query this value will be the hash of the transaction that modified this Trustline. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction
     * @see RippleRestTrustline::$hash
     * @see RippleRestTrustline::setHash
     * @return string (Hash256) 
     */
    public function getHash() {
        return $this->_Hash;
    }
    
    /**
     * If this object was returned by a historical query this value will be the hash of the transaction that modified this Trustline. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction
     * @see RippleRestTrustline::$hash
     * @see RippleRestTrustline::getHash
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
    protected $_Previous;
    
    /**
     * If the trustline was changed this will be a full Trustline object representing the previous values. If the previous object also had a previous object that will be removed to reduce data complexity. Trustline changes can be walked backwards by querying the API for previous.hash repeatedly
     * @see RippleRestTrustline::$previous
     * @see RippleRestTrustline::setPrevious
     * @return RippleRestTrustline 
     */
    public function getPrevious() {
        return $this->_Previous;
    }
    
    /**
     * If the trustline was changed this will be a full Trustline object representing the previous values. If the previous object also had a previous object that will be removed to reduce data complexity. Trustline changes can be walked backwards by querying the API for previous.hash repeatedly
     * @see RippleRestTrustline::$previous
     * @see RippleRestTrustline::getPrevious
     * @param RippleRestTrustline $value 
     * @return null
     */
    public function setPrevious($value) {
        try {
            if (!self::_checkTrustline($value)) throw new Exception("");
            $this->_Previous = self::_fromTrustline($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "RippleRestTrustline");
        }
    }
    
    /**
     * @internal
     */
    protected function initPrevious($value) {
        $this->_Previous = self::_fromTrustline($value);
    }


    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
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
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, self::PATTERN_LEDGER);
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);
    
        $array["previous"] = self::_toTrustline($this->_Previous);
        if (is_null($array["previous"])) unset($array["previous"]);

        return $array;
    }
}

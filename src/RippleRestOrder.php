<?php
class RippleRestOrder extends RippleRestObject {
    protected static $__properties = array(
        "account" => "Account", 
        "account" => "Account", 
        "buy" => "Buy", 
        "buy" => "Buy", 
        "base_amount" => "BaseAmount", 
        "baseamount" => "BaseAmount", 
        "counter_amount" => "CounterAmount", 
        "counteramount" => "CounterAmount", 
        "exchange_rate" => "ExchangeRate", 
        "exchangerate" => "ExchangeRate", 
        "expiration_timestamp" => "ExpirationTimestamp", 
        "expirationtimestamp" => "ExpirationTimestamp", 
        "ledger_timeout" => "LedgerTimeout", 
        "ledgertimeout" => "LedgerTimeout", 
        "immediate_or_cancel" => "ImmediateOrCancel", 
        "immediateorcancel" => "ImmediateOrCancel", 
        "fill_or_kill" => "FillOrKill", 
        "fillorkill" => "FillOrKill", 
        "maximize_buy_or_sell" => "MaximizeBuyOrSell", 
        "maximizebuyorsell" => "MaximizeBuyOrSell", 
        "cancel_replace" => "CancelReplace", 
        "cancelreplace" => "CancelReplace", 
        "sequence" => "Sequence", 
        "sequence" => "Sequence", 
        "fee" => "Fee", 
        "fee" => "Fee", 
        "state" => "State", 
        "state" => "State", 
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
    
    protected $_Buy;
    
    public function getBuy() {
        return $this->_Buy;
    }
    
    public function setBuy($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_Buy = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initBuy($value) {
        $this->_Buy = self::_fromBoolean($value);
    }
    
    protected $_BaseAmount;
    
    public function getBaseAmount() {
        return $this->_BaseAmount;
    }
    
    public function setBaseAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_BaseAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Amount]");
        }
    }
    
    private function initBaseAmount($value) {
        $this->_BaseAmount = self::_fromAmount($value);
    }
    
    protected $_CounterAmount;
    
    public function getCounterAmount() {
        return $this->_CounterAmount;
    }
    
    public function setCounterAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_CounterAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Amount]");
        }
    }
    
    private function initCounterAmount($value) {
        $this->_CounterAmount = self::_fromAmount($value);
    }
    
    protected $_ExchangeRate;
    
    public function getExchangeRate() {
        return $this->_ExchangeRate;
    }
    
    public function setExchangeRate($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_ExchangeRate = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<FloatString>]");
        }
    }
    
    private function initExchangeRate($value) {
        $this->_ExchangeRate = self::_fromFloatString($value);
    }
    
    protected $_ExpirationTimestamp;
    
    public function getExpirationTimestamp() {
        return $this->_ExpirationTimestamp;
    }
    
    public function setExpirationTimestamp($value) {
        try {
            if (!self::_checkTimestamp($value)) throw new Exception("");
            $this->_ExpirationTimestamp = self::_fromTimestamp($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Timestamp>]");
        }
    }
    
    private function initExpirationTimestamp($value) {
        $this->_ExpirationTimestamp = self::_fromTimestamp($value);
    }
    
    protected $_LedgerTimeout;
    
    public function getLedgerTimeout() {
        return $this->_LedgerTimeout;
    }
    
    public function setLedgerTimeout($value) {
        try {
            if (!self::_checkStringPattern($value, "^[0-9]*$")) throw new Exception("");
            $this->_LedgerTimeout = self::_fromStringPattern($value, "^[0-9]*$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^[0-9]*$\"+");
        }
    }
    
    private function initLedgerTimeout($value) {
        $this->_LedgerTimeout = self::_fromStringPattern($value, "^[0-9]*$");
    }
    
    protected $_ImmediateOrCancel;
    
    public function getImmediateOrCancel() {
        return $this->_ImmediateOrCancel;
    }
    
    public function setImmediateOrCancel($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_ImmediateOrCancel = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initImmediateOrCancel($value) {
        $this->_ImmediateOrCancel = self::_fromBoolean($value);
    }
    
    protected $_FillOrKill;
    
    public function getFillOrKill() {
        return $this->_FillOrKill;
    }
    
    public function setFillOrKill($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_FillOrKill = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initFillOrKill($value) {
        $this->_FillOrKill = self::_fromBoolean($value);
    }
    
    protected $_MaximizeBuyOrSell;
    
    public function getMaximizeBuyOrSell() {
        return $this->_MaximizeBuyOrSell;
    }
    
    public function setMaximizeBuyOrSell($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_MaximizeBuyOrSell = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initMaximizeBuyOrSell($value) {
        $this->_MaximizeBuyOrSell = self::_fromBoolean($value);
    }
    
    protected $_CancelReplace;
    
    public function getCancelReplace() {
        return $this->_CancelReplace;
    }
    
    public function setCancelReplace($value) {
        try {
            if (!self::_checkStringPattern($value, "^d*$")) throw new Exception("");
            $this->_CancelReplace = self::_fromStringPattern($value, "^d*$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^d*$\"+");
        }
    }
    
    private function initCancelReplace($value) {
        $this->_CancelReplace = self::_fromStringPattern($value, "^d*$");
    }
    
    protected $_Sequence;
    
    public function getSequence() {
        return $this->_Sequence;
    }
    
    public function setSequence($value) {
        try {
            if (!self::_checkStringPattern($value, "^[0-9]*$")) throw new Exception("");
            $this->_Sequence = self::_fromStringPattern($value, "^[0-9]*$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^[0-9]*$\"+");
        }
    }
    
    private function initSequence($value) {
        $this->_Sequence = self::_fromStringPattern($value, "^[0-9]*$");
    }
    
    protected $_Fee;
    
    public function getFee() {
        return $this->_Fee;
    }
    
    public function setFee($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_Fee = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<FloatString>]");
        }
    }
    
    private function initFee($value) {
        $this->_Fee = self::_fromFloatString($value);
    }
    
    protected $_State;
    
    public function getState() {
        return $this->_State;
    }
    
    public function setState($value) {
        try {
            if (!self::_checkStringPattern($value, "^active|validated|filled|cancelled|expired|failed$")) throw new Exception("");
            $this->_State = self::_fromStringPattern($value, "^active|validated|filled|cancelled|expired|failed$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^active|validated|filled|cancelled|expired|failed$\"+");
        }
    }
    
    private function initState($value) {
        $this->_State = self::_fromStringPattern($value, "^active|validated|filled|cancelled|expired|failed$");
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
            if (!self::_checkOrder($value)) throw new Exception("");
            $this->_Previous = self::_fromOrder($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Order]");
        }
    }
    
    private function initPrevious($value) {
        $this->_Previous = self::_fromOrder($value);
    }
  
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"]))
            throw new Exception("Field Account is required in RippleRestOrder");
    
        $array["buy"] = self::_toBoolean($this->_Buy);
        if (is_null($array["buy"])) unset($array["buy"]);
    
        $array["base_amount"] = self::_toAmount($this->_BaseAmount);
        if (is_null($array["base_amount"])) unset($array["base_amount"]);
    
        $array["counter_amount"] = self::_toAmount($this->_CounterAmount);
        if (is_null($array["counter_amount"])) unset($array["counter_amount"]);
    
        $array["exchange_rate"] = self::_toFloatString($this->_ExchangeRate);
        if (is_null($array["exchange_rate"])) unset($array["exchange_rate"]);
    
        $array["expiration_timestamp"] = self::_toTimestamp($this->_ExpirationTimestamp);
        if (is_null($array["expiration_timestamp"])) unset($array["expiration_timestamp"]);
    
        $array["ledger_timeout"] = self::_toStringPattern($this->_LedgerTimeout, "^[0-9]*$");
        if (is_null($array["ledger_timeout"])) unset($array["ledger_timeout"]);
    
        $array["immediate_or_cancel"] = self::_toBoolean($this->_ImmediateOrCancel);
        if (is_null($array["immediate_or_cancel"])) unset($array["immediate_or_cancel"]);
    
        $array["fill_or_kill"] = self::_toBoolean($this->_FillOrKill);
        if (is_null($array["fill_or_kill"])) unset($array["fill_or_kill"]);
    
        $array["maximize_buy_or_sell"] = self::_toBoolean($this->_MaximizeBuyOrSell);
        if (is_null($array["maximize_buy_or_sell"])) unset($array["maximize_buy_or_sell"]);
    
        $array["cancel_replace"] = self::_toStringPattern($this->_CancelReplace, "^d*$");
        if (is_null($array["cancel_replace"])) unset($array["cancel_replace"]);
    
        $array["sequence"] = self::_toStringPattern($this->_Sequence, "^[0-9]*$");
        if (is_null($array["sequence"])) unset($array["sequence"]);
    
        $array["fee"] = self::_toFloatString($this->_Fee);
        if (is_null($array["fee"])) unset($array["fee"]);
    
        $array["state"] = self::_toStringPattern($this->_State, "^active|validated|filled|cancelled|expired|failed$");
        if (is_null($array["state"])) unset($array["state"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, "^[0-9]+$");
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);
    
        $array["previous"] = self::_toOrder($this->_Previous);
        if (is_null($array["previous"])) unset($array["previous"]);

        return $array;
    }
}

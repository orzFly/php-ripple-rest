<?php
class RippleRestPayment extends RippleRestObject {
    protected static $__properties = array(
        "source_account" => "SourceAccount", 
        "sourceaccount" => "SourceAccount", 
        "source_tag" => "SourceTag", 
        "sourcetag" => "SourceTag", 
        "source_amount" => "SourceAmount", 
        "sourceamount" => "SourceAmount", 
        "source_slippage" => "SourceSlippage", 
        "sourceslippage" => "SourceSlippage", 
        "destination_account" => "DestinationAccount", 
        "destinationaccount" => "DestinationAccount", 
        "destination_tag" => "DestinationTag", 
        "destinationtag" => "DestinationTag", 
        "destination_amount" => "DestinationAmount", 
        "destinationamount" => "DestinationAmount", 
        "invoice_id" => "InvoiceId", 
        "invoiceid" => "InvoiceId", 
        "paths" => "Paths", 
        "paths" => "Paths", 
        "partial_payment" => "PartialPayment", 
        "partialpayment" => "PartialPayment", 
        "no_direct_ripple" => "NoDirectRipple", 
        "nodirectripple" => "NoDirectRipple", 
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
        "fee" => "Fee", 
        "fee" => "Fee", 
        "source_balance_changes" => "SourceBalanceChanges", 
        "sourcebalancechanges" => "SourceBalanceChanges", 
        "destination_balance_changes" => "DestinationBalanceChanges", 
        "destinationbalancechanges" => "DestinationBalanceChanges"
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
    
    protected $_SourceAccount;
    
    public function getSourceAccount() {
        return $this->_SourceAccount;
    }
    
    public function setSourceAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_SourceAccount = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<RippleAddress>]");
        }
    }
    
    private function initSourceAccount($value) {
        $this->_SourceAccount = self::_fromRippleAddress($value);
    }
    
    protected $_SourceTag;
    
    public function getSourceTag() {
        return $this->_SourceTag;
    }
    
    public function setSourceTag($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_SourceTag = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<UINT32>]");
        }
    }
    
    private function initSourceTag($value) {
        $this->_SourceTag = self::_fromUINT32($value);
    }
    
    protected $_SourceAmount;
    
    public function getSourceAmount() {
        return $this->_SourceAmount;
    }
    
    public function setSourceAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_SourceAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Amount]");
        }
    }
    
    private function initSourceAmount($value) {
        $this->_SourceAmount = self::_fromAmount($value);
    }
    
    protected $_SourceSlippage;
    
    public function getSourceSlippage() {
        return $this->_SourceSlippage;
    }
    
    public function setSourceSlippage($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_SourceSlippage = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<FloatString>]");
        }
    }
    
    private function initSourceSlippage($value) {
        $this->_SourceSlippage = self::_fromFloatString($value);
    }
    
    protected $_DestinationAccount;
    
    public function getDestinationAccount() {
        return $this->_DestinationAccount;
    }
    
    public function setDestinationAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_DestinationAccount = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<RippleAddress>]");
        }
    }
    
    private function initDestinationAccount($value) {
        $this->_DestinationAccount = self::_fromRippleAddress($value);
    }
    
    protected $_DestinationTag;
    
    public function getDestinationTag() {
        return $this->_DestinationTag;
    }
    
    public function setDestinationTag($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_DestinationTag = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<UINT32>]");
        }
    }
    
    private function initDestinationTag($value) {
        $this->_DestinationTag = self::_fromUINT32($value);
    }
    
    protected $_DestinationAmount;
    
    public function getDestinationAmount() {
        return $this->_DestinationAmount;
    }
    
    public function setDestinationAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_DestinationAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Amount]");
        }
    }
    
    private function initDestinationAmount($value) {
        $this->_DestinationAmount = self::_fromAmount($value);
    }
    
    protected $_InvoiceId;
    
    public function getInvoiceId() {
        return $this->_InvoiceId;
    }
    
    public function setInvoiceId($value) {
        try {
            if (!self::_checkHash256($value)) throw new Exception("");
            $this->_InvoiceId = self::_fromHash256($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String<Hash256>]");
        }
    }
    
    private function initInvoiceId($value) {
        $this->_InvoiceId = self::_fromHash256($value);
    }
    
    protected $_Paths;
    
    public function getPaths() {
        return $this->_Paths;
    }
    
    public function setPaths($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_Paths = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String]");
        }
    }
    
    private function initPaths($value) {
        $this->_Paths = self::_fromString($value);
    }
    
    protected $_PartialPayment;
    
    public function getPartialPayment() {
        return $this->_PartialPayment;
    }
    
    public function setPartialPayment($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_PartialPayment = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initPartialPayment($value) {
        $this->_PartialPayment = self::_fromBoolean($value);
    }
    
    protected $_NoDirectRipple;
    
    public function getNoDirectRipple() {
        return $this->_NoDirectRipple;
    }
    
    public function setNoDirectRipple($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_NoDirectRipple = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Boolean]");
        }
    }
    
    private function initNoDirectRipple($value) {
        $this->_NoDirectRipple = self::_fromBoolean($value);
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
            if (!self::_checkStringPattern($value, "^validated|failed|new$")) throw new Exception("");
            $this->_State = self::_fromStringPattern($value, "^validated|failed|new$");
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[String] +\"^validated|failed|new$\"+");
        }
    }
    
    private function initState($value) {
        $this->_State = self::_fromStringPattern($value, "^validated|failed|new$");
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
    
    protected $_SourceBalanceChanges;
    
    public function getSourceBalanceChanges() {
        return $this->_SourceBalanceChanges;
    }
    
    public function setSourceBalanceChanges($value) {
        try {
            if (!self::_checkArrayAmount($value)) throw new Exception("");
            $this->_SourceBalanceChanges = self::_fromArrayAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Array<Amount>]");
        }
    }
    
    private function initSourceBalanceChanges($value) {
        $this->_SourceBalanceChanges = self::_fromArrayAmount($value);
    }
    
    protected $_DestinationBalanceChanges;
    
    public function getDestinationBalanceChanges() {
        return $this->_DestinationBalanceChanges;
    }
    
    public function setDestinationBalanceChanges($value) {
        try {
            if (!self::_checkArrayAmount($value)) throw new Exception("");
            $this->_DestinationBalanceChanges = self::_fromArrayAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "[Array<Amount>]");
        }
    }
    
    private function initDestinationBalanceChanges($value) {
        $this->_DestinationBalanceChanges = self::_fromArrayAmount($value);
    }
  
    public function toArray()
    {
        $array = array();
    
        $array["source_account"] = self::_toRippleAddress($this->_SourceAccount);
        if (is_null($array["source_account"]))
            throw new Exception("Field SourceAccount is required in RippleRestPayment");
    
        $array["source_tag"] = self::_toUINT32($this->_SourceTag);
        if (is_null($array["source_tag"])) unset($array["source_tag"]);
    
        $array["source_amount"] = self::_toAmount($this->_SourceAmount);
        if (is_null($array["source_amount"])) unset($array["source_amount"]);
    
        $array["source_slippage"] = self::_toFloatString($this->_SourceSlippage);
        if (is_null($array["source_slippage"])) unset($array["source_slippage"]);
    
        $array["destination_account"] = self::_toRippleAddress($this->_DestinationAccount);
        if (is_null($array["destination_account"]))
            throw new Exception("Field DestinationAccount is required in RippleRestPayment");
    
        $array["destination_tag"] = self::_toUINT32($this->_DestinationTag);
        if (is_null($array["destination_tag"])) unset($array["destination_tag"]);
    
        $array["destination_amount"] = self::_toAmount($this->_DestinationAmount);
        if (is_null($array["destination_amount"]))
            throw new Exception("Field DestinationAmount is required in RippleRestPayment");
    
        $array["invoice_id"] = self::_toHash256($this->_InvoiceId);
        if (is_null($array["invoice_id"])) unset($array["invoice_id"]);
    
        $array["paths"] = self::_toString($this->_Paths);
        if (is_null($array["paths"])) unset($array["paths"]);
    
        $array["partial_payment"] = self::_toBoolean($this->_PartialPayment);
        if (is_null($array["partial_payment"])) unset($array["partial_payment"]);
    
        $array["no_direct_ripple"] = self::_toBoolean($this->_NoDirectRipple);
        if (is_null($array["no_direct_ripple"])) unset($array["no_direct_ripple"]);
    
        $array["direction"] = self::_toStringPattern($this->_Direction, "^incoming|outgoing|passthrough$");
        if (is_null($array["direction"])) unset($array["direction"]);
    
        $array["state"] = self::_toStringPattern($this->_State, "^validated|failed|new$");
        if (is_null($array["state"])) unset($array["state"]);
    
        $array["result"] = self::_toStringPattern($this->_Result, "te[cfjlms][A-Za-z_]+");
        if (is_null($array["result"])) unset($array["result"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, "^[0-9]+$");
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);
    
        $array["timestamp"] = self::_toTimestamp($this->_Timestamp);
        if (is_null($array["timestamp"])) unset($array["timestamp"]);
    
        $array["fee"] = self::_toFloatString($this->_Fee);
        if (is_null($array["fee"])) unset($array["fee"]);
    
        $array["source_balance_changes"] = self::_toArrayAmount($this->_SourceBalanceChanges);
        if (is_null($array["source_balance_changes"])) unset($array["source_balance_changes"]);
    
        $array["destination_balance_changes"] = self::_toArrayAmount($this->_DestinationBalanceChanges);
        if (is_null($array["destination_balance_changes"])) unset($array["destination_balance_changes"]);

        return $array;
    }
}

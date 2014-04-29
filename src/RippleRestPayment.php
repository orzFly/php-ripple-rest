<?php
/**
 * Contains class RippleRestPayment
 *
 * @license MIT
 */


/**
 * A flattened Payment object used by the ripple-rest API
 * @property string $sourceAccount (RippleAddress) The Ripple account address of the Payment sender
 * @property string $sourceTag (UINT32) A string representing an unsigned 32-bit integer most commonly used to refer to a sender's hosted account at a Ripple gateway
 * @property RippleRestAmount $sourceAmount An optional amount that can be specified to constrain cross-currency payments
 * @property string $sourceSlippage (FloatString) An optional cushion for the source_amount to increase the likelihood that the payment will succeed. The source_account will never be charged more than source_amount.value + source_slippage
 * @property string $destinationAccount (RippleAddress) 
 * @property string $destinationTag (UINT32) A string representing an unsigned 32-bit integer most commonly used to refer to a receiver's hosted account at a Ripple gateway
 * @property RippleRestAmount $destinationAmount The amount the destination_account will receive
 * @property string $invoiceId (Hash256) A 256-bit hash that can be used to identify a particular payment
 * @property string $paths A "stringified" version of the Ripple PathSet structure that users should treat as opaque
 * @property boolean $partialPayment A boolean that, if set to true, indicates that this payment should go through even if the whole amount cannot be delivered because of a lack of liquidity or funds in the source_account account
 * @property boolean $noDirectRipple A boolean that can be set to true if paths are specified and the sender would like the Ripple Network to disregard any direct paths from the source_account to the destination_account. This may be used to take advantage of an arbitrage opportunity or by gateways wishing to issue balances from a hot wallet to a user who has mistakenly set a trustline directly to the hot wallet
 * @property string $direction (`/^incoming|outgoing|passthrough$/`) The direction of the payment, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
 * @property string $state (`/^validated|failed|new$/`) The state of the payment from the perspective of the Ripple Ledger. Possible values are "validated" and "failed" and "new" if the payment has not been submitted yet
 * @property string $result (`/te[cfjlms][A-Za-z_]+/`) The rippled code indicating the success or failure type of the payment. The code "tesSUCCESS" indicates that the payment was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
 * @property string $ledger (`/^[0-9]+$/`) The string representation of the index number of the ledger containing the validated or failed payment. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
 * @property string $hash (Hash256) The 256-bit hash of the payment. This is used throughout the Ripple protocol as the unique identifier for the transaction
 * @property string $timestamp (Timestamp) The timestamp representing when the payment was validated and written into the Ripple ledger
 * @property string $fee (FloatString) The Ripple Network transaction fee, represented in whole XRP (NOT "drops", or millionths of an XRP, which is used elsewhere in the Ripple protocol)
 * @property Amount[] $sourceBalanceChanges Parsed from the validated transaction metadata, this array represents all of the changes to balances held by the source_account. Most often this will have one amount representing the Ripple Network fee and, if the source_amount was not XRP, one amount representing the actual source_amount that was sent
 * @property Amount[] $destinationBalanceChanges Parsed from the validated transaction metadata, this array represents the changes to balances held by the destination_account. For those receiving payments this is important to check because if the partial_payment flag is set this value may be less than the destination_amount

 */
class RippleRestPayment extends RippleRestObject {
    /**
     * @internal
     */
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
        "partial_payment" => "PartialPayment", 
        "partialpayment" => "PartialPayment", 
        "no_direct_ripple" => "NoDirectRipple", 
        "nodirectripple" => "NoDirectRipple", 
        "direction" => "Direction", 
        "state" => "State", 
        "result" => "Result", 
        "ledger" => "Ledger", 
        "hash" => "Hash", 
        "timestamp" => "Timestamp", 
        "fee" => "Fee", 
        "source_balance_changes" => "SourceBalanceChanges", 
        "sourcebalancechanges" => "SourceBalanceChanges", 
        "destination_balance_changes" => "DestinationBalanceChanges", 
        "destinationbalancechanges" => "DestinationBalanceChanges"
    );
    
    /**
     * Pattern Rule for field `RippleRestPayment::$direction`
     * @see RippleRestPayment::$direction
     * @see RippleRestPayment::setDirection
     * @see RippleRestPayment::getDirection
     */
    const PATTERN_DIRECTION = "^incoming|outgoing|passthrough$";
    
    /**
     * Pattern Rule for field `RippleRestPayment::$state`
     * @see RippleRestPayment::$state
     * @see RippleRestPayment::setState
     * @see RippleRestPayment::getState
     */
    const PATTERN_STATE = "^validated|failed|new$";
    
    /**
     * Pattern Rule for field `RippleRestPayment::$result`
     * @see RippleRestPayment::$result
     * @see RippleRestPayment::setResult
     * @see RippleRestPayment::getResult
     */
    const PATTERN_RESULT = "te[cfjlms][A-Za-z_]+";
    
    /**
     * Pattern Rule for field `RippleRestPayment::$ledger`
     * @see RippleRestPayment::$ledger
     * @see RippleRestPayment::setLedger
     * @see RippleRestPayment::getLedger
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
     * Create a new instance of RippleRestPayment.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRestPayment
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
    protected $_SourceAccount;
    
    /**
     * The Ripple account address of the Payment sender
     * @see RippleRestPayment::$sourceAccount
     * @see RippleRestPayment::setSourceAccount
     * @return string (RippleAddress) 
     */
    public function getSourceAccount() {
        return $this->_SourceAccount;
    }
    
    /**
     * The Ripple account address of the Payment sender
     * @see RippleRestPayment::$sourceAccount
     * @see RippleRestPayment::getSourceAccount
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setSourceAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_SourceAccount = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initSourceAccount($value) {
        $this->_SourceAccount = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_SourceTag;
    
    /**
     * A string representing an unsigned 32-bit integer most commonly used to refer to a sender's hosted account at a Ripple gateway
     * @see RippleRestPayment::$sourceTag
     * @see RippleRestPayment::setSourceTag
     * @return string (UINT32) 
     */
    public function getSourceTag() {
        return $this->_SourceTag;
    }
    
    /**
     * A string representing an unsigned 32-bit integer most commonly used to refer to a sender's hosted account at a Ripple gateway
     * @see RippleRestPayment::$sourceTag
     * @see RippleRestPayment::getSourceTag
     * @param string $value (UINT32) 
     * @return null
     */
    public function setSourceTag($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_SourceTag = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initSourceTag($value) {
        $this->_SourceTag = self::_fromUINT32($value);
    }
    
    /**
     * @internal
     */
    protected $_SourceAmount;
    
    /**
     * An optional amount that can be specified to constrain cross-currency payments
     * @see RippleRestPayment::$sourceAmount
     * @see RippleRestPayment::setSourceAmount
     * @return RippleRestAmount 
     */
    public function getSourceAmount() {
        return $this->_SourceAmount;
    }
    
    /**
     * An optional amount that can be specified to constrain cross-currency payments
     * @see RippleRestPayment::$sourceAmount
     * @see RippleRestPayment::getSourceAmount
     * @param RippleRestAmount $value 
     * @return null
     */
    public function setSourceAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_SourceAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "RippleRestAmount");
        }
    }
    
    /**
     * @internal
     */
    protected function initSourceAmount($value) {
        $this->_SourceAmount = self::_fromAmount($value);
    }
    
    /**
     * @internal
     */
    protected $_SourceSlippage;
    
    /**
     * An optional cushion for the source_amount to increase the likelihood that the payment will succeed. The source_account will never be charged more than source_amount.value + source_slippage
     * @see RippleRestPayment::$sourceSlippage
     * @see RippleRestPayment::setSourceSlippage
     * @return string (FloatString) 
     */
    public function getSourceSlippage() {
        return $this->_SourceSlippage;
    }
    
    /**
     * An optional cushion for the source_amount to increase the likelihood that the payment will succeed. The source_account will never be charged more than source_amount.value + source_slippage
     * @see RippleRestPayment::$sourceSlippage
     * @see RippleRestPayment::getSourceSlippage
     * @param string $value (FloatString) 
     * @return null
     */
    public function setSourceSlippage($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_SourceSlippage = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initSourceSlippage($value) {
        $this->_SourceSlippage = self::_fromFloatString($value);
    }
    
    /**
     * @internal
     */
    protected $_DestinationAccount;
    
    /**
     * 
     * @see RippleRestPayment::$destinationAccount
     * @see RippleRestPayment::setDestinationAccount
     * @return string (RippleAddress) 
     */
    public function getDestinationAccount() {
        return $this->_DestinationAccount;
    }
    
    /**
     * 
     * @see RippleRestPayment::$destinationAccount
     * @see RippleRestPayment::getDestinationAccount
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setDestinationAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_DestinationAccount = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initDestinationAccount($value) {
        $this->_DestinationAccount = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_DestinationTag;
    
    /**
     * A string representing an unsigned 32-bit integer most commonly used to refer to a receiver's hosted account at a Ripple gateway
     * @see RippleRestPayment::$destinationTag
     * @see RippleRestPayment::setDestinationTag
     * @return string (UINT32) 
     */
    public function getDestinationTag() {
        return $this->_DestinationTag;
    }
    
    /**
     * A string representing an unsigned 32-bit integer most commonly used to refer to a receiver's hosted account at a Ripple gateway
     * @see RippleRestPayment::$destinationTag
     * @see RippleRestPayment::getDestinationTag
     * @param string $value (UINT32) 
     * @return null
     */
    public function setDestinationTag($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_DestinationTag = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initDestinationTag($value) {
        $this->_DestinationTag = self::_fromUINT32($value);
    }
    
    /**
     * @internal
     */
    protected $_DestinationAmount;
    
    /**
     * The amount the destination_account will receive
     * @see RippleRestPayment::$destinationAmount
     * @see RippleRestPayment::setDestinationAmount
     * @return RippleRestAmount 
     */
    public function getDestinationAmount() {
        return $this->_DestinationAmount;
    }
    
    /**
     * The amount the destination_account will receive
     * @see RippleRestPayment::$destinationAmount
     * @see RippleRestPayment::getDestinationAmount
     * @param RippleRestAmount $value 
     * @return null
     */
    public function setDestinationAmount($value) {
        try {
            if (!self::_checkAmount($value)) throw new Exception("");
            $this->_DestinationAmount = self::_fromAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "RippleRestAmount");
        }
    }
    
    /**
     * @internal
     */
    protected function initDestinationAmount($value) {
        $this->_DestinationAmount = self::_fromAmount($value);
    }
    
    /**
     * @internal
     */
    protected $_InvoiceId;
    
    /**
     * A 256-bit hash that can be used to identify a particular payment
     * @see RippleRestPayment::$invoiceId
     * @see RippleRestPayment::setInvoiceId
     * @return string (Hash256) 
     */
    public function getInvoiceId() {
        return $this->_InvoiceId;
    }
    
    /**
     * A 256-bit hash that can be used to identify a particular payment
     * @see RippleRestPayment::$invoiceId
     * @see RippleRestPayment::getInvoiceId
     * @param string $value (Hash256) 
     * @return null
     */
    public function setInvoiceId($value) {
        try {
            if (!self::_checkHash256($value)) throw new Exception("");
            $this->_InvoiceId = self::_fromHash256($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initInvoiceId($value) {
        $this->_InvoiceId = self::_fromHash256($value);
    }
    
    /**
     * @internal
     */
    protected $_Paths;
    
    /**
     * A "stringified" version of the Ripple PathSet structure that users should treat as opaque
     * @see RippleRestPayment::$paths
     * @see RippleRestPayment::setPaths
     * @return string 
     */
    public function getPaths() {
        return $this->_Paths;
    }
    
    /**
     * A "stringified" version of the Ripple PathSet structure that users should treat as opaque
     * @see RippleRestPayment::$paths
     * @see RippleRestPayment::getPaths
     * @param string $value 
     * @return null
     */
    public function setPaths($value) {
        try {
            if (!self::_checkString($value)) throw new Exception("");
            $this->_Paths = self::_fromString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initPaths($value) {
        $this->_Paths = self::_fromString($value);
    }
    
    /**
     * @internal
     */
    protected $_PartialPayment;
    
    /**
     * A boolean that, if set to true, indicates that this payment should go through even if the whole amount cannot be delivered because of a lack of liquidity or funds in the source_account account
     * @see RippleRestPayment::$partialPayment
     * @see RippleRestPayment::setPartialPayment
     * @return boolean 
     */
    public function getPartialPayment() {
        return $this->_PartialPayment;
    }
    
    /**
     * A boolean that, if set to true, indicates that this payment should go through even if the whole amount cannot be delivered because of a lack of liquidity or funds in the source_account account
     * @see RippleRestPayment::$partialPayment
     * @see RippleRestPayment::getPartialPayment
     * @param boolean $value 
     * @return null
     */
    public function setPartialPayment($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_PartialPayment = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initPartialPayment($value) {
        $this->_PartialPayment = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_NoDirectRipple;
    
    /**
     * A boolean that can be set to true if paths are specified and the sender would like the Ripple Network to disregard any direct paths from the source_account to the destination_account. This may be used to take advantage of an arbitrage opportunity or by gateways wishing to issue balances from a hot wallet to a user who has mistakenly set a trustline directly to the hot wallet
     * @see RippleRestPayment::$noDirectRipple
     * @see RippleRestPayment::setNoDirectRipple
     * @return boolean 
     */
    public function getNoDirectRipple() {
        return $this->_NoDirectRipple;
    }
    
    /**
     * A boolean that can be set to true if paths are specified and the sender would like the Ripple Network to disregard any direct paths from the source_account to the destination_account. This may be used to take advantage of an arbitrage opportunity or by gateways wishing to issue balances from a hot wallet to a user who has mistakenly set a trustline directly to the hot wallet
     * @see RippleRestPayment::$noDirectRipple
     * @see RippleRestPayment::getNoDirectRipple
     * @param boolean $value 
     * @return null
     */
    public function setNoDirectRipple($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_NoDirectRipple = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initNoDirectRipple($value) {
        $this->_NoDirectRipple = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_Direction;
    
    /**
     * The direction of the payment, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
     * @see RippleRestPayment::$direction
     * @see RippleRestPayment::setDirection
     * @return string (`/^incoming|outgoing|passthrough$/`) 
     */
    public function getDirection() {
        return $this->_Direction;
    }
    
    /**
     * The direction of the payment, from the perspective of the account being queried. Possible values are "incoming", "outgoing", and "passthrough"
     * @see RippleRestPayment::$direction
     * @see RippleRestPayment::getDirection
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
     * The state of the payment from the perspective of the Ripple Ledger. Possible values are "validated" and "failed" and "new" if the payment has not been submitted yet
     * @see RippleRestPayment::$state
     * @see RippleRestPayment::setState
     * @return string (`/^validated|failed|new$/`) 
     */
    public function getState() {
        return $this->_State;
    }
    
    /**
     * The state of the payment from the perspective of the Ripple Ledger. Possible values are "validated" and "failed" and "new" if the payment has not been submitted yet
     * @see RippleRestPayment::$state
     * @see RippleRestPayment::getState
     * @param string $value (`/^validated|failed|new$/`) 
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
     * The rippled code indicating the success or failure type of the payment. The code "tesSUCCESS" indicates that the payment was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
     * @see RippleRestPayment::$result
     * @see RippleRestPayment::setResult
     * @return string (`/te[cfjlms][A-Za-z_]+/`) 
     */
    public function getResult() {
        return $this->_Result;
    }
    
    /**
     * The rippled code indicating the success or failure type of the payment. The code "tesSUCCESS" indicates that the payment was successfully validated and written into the Ripple Ledger. All other codes will begin with the following prefixes: "tec", "tef", "tel", or "tej"
     * @see RippleRestPayment::$result
     * @see RippleRestPayment::getResult
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
     * The string representation of the index number of the ledger containing the validated or failed payment. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
     * @see RippleRestPayment::$ledger
     * @see RippleRestPayment::setLedger
     * @return string (`/^[0-9]+$/`) 
     */
    public function getLedger() {
        return $this->_Ledger;
    }
    
    /**
     * The string representation of the index number of the ledger containing the validated or failed payment. Failed payments will only be written into the Ripple Ledger if they fail after submission to a rippled and a Ripple Network fee is claimed
     * @see RippleRestPayment::$ledger
     * @see RippleRestPayment::getLedger
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
     * The 256-bit hash of the payment. This is used throughout the Ripple protocol as the unique identifier for the transaction
     * @see RippleRestPayment::$hash
     * @see RippleRestPayment::setHash
     * @return string (Hash256) 
     */
    public function getHash() {
        return $this->_Hash;
    }
    
    /**
     * The 256-bit hash of the payment. This is used throughout the Ripple protocol as the unique identifier for the transaction
     * @see RippleRestPayment::$hash
     * @see RippleRestPayment::getHash
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
     * The timestamp representing when the payment was validated and written into the Ripple ledger
     * @see RippleRestPayment::$timestamp
     * @see RippleRestPayment::setTimestamp
     * @return string (Timestamp) 
     */
    public function getTimestamp() {
        return $this->_Timestamp;
    }
    
    /**
     * The timestamp representing when the payment was validated and written into the Ripple ledger
     * @see RippleRestPayment::$timestamp
     * @see RippleRestPayment::getTimestamp
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
    protected $_Fee;
    
    /**
     * The Ripple Network transaction fee, represented in whole XRP (NOT "drops", or millionths of an XRP, which is used elsewhere in the Ripple protocol)
     * @see RippleRestPayment::$fee
     * @see RippleRestPayment::setFee
     * @return string (FloatString) 
     */
    public function getFee() {
        return $this->_Fee;
    }
    
    /**
     * The Ripple Network transaction fee, represented in whole XRP (NOT "drops", or millionths of an XRP, which is used elsewhere in the Ripple protocol)
     * @see RippleRestPayment::$fee
     * @see RippleRestPayment::getFee
     * @param string $value (FloatString) 
     * @return null
     */
    public function setFee($value) {
        try {
            if (!self::_checkFloatString($value)) throw new Exception("");
            $this->_Fee = self::_fromFloatString($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initFee($value) {
        $this->_Fee = self::_fromFloatString($value);
    }
    
    /**
     * @internal
     */
    protected $_SourceBalanceChanges;
    
    /**
     * Parsed from the validated transaction metadata, this array represents all of the changes to balances held by the source_account. Most often this will have one amount representing the Ripple Network fee and, if the source_amount was not XRP, one amount representing the actual source_amount that was sent
     * @see RippleRestPayment::$sourceBalanceChanges
     * @see RippleRestPayment::setSourceBalanceChanges
     * @return Amount[] 
     */
    public function getSourceBalanceChanges() {
        return $this->_SourceBalanceChanges;
    }
    
    /**
     * Parsed from the validated transaction metadata, this array represents all of the changes to balances held by the source_account. Most often this will have one amount representing the Ripple Network fee and, if the source_amount was not XRP, one amount representing the actual source_amount that was sent
     * @see RippleRestPayment::$sourceBalanceChanges
     * @see RippleRestPayment::getSourceBalanceChanges
     * @param Amount[] $value 
     * @return null
     */
    public function setSourceBalanceChanges($value) {
        try {
            if (!self::_checkArrayAmount($value)) throw new Exception("");
            $this->_SourceBalanceChanges = self::_fromArrayAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "Amount[]");
        }
    }
    
    /**
     * @internal
     */
    protected function initSourceBalanceChanges($value) {
        $this->_SourceBalanceChanges = self::_fromArrayAmount($value);
    }
    
    /**
     * @internal
     */
    protected $_DestinationBalanceChanges;
    
    /**
     * Parsed from the validated transaction metadata, this array represents the changes to balances held by the destination_account. For those receiving payments this is important to check because if the partial_payment flag is set this value may be less than the destination_amount
     * @see RippleRestPayment::$destinationBalanceChanges
     * @see RippleRestPayment::setDestinationBalanceChanges
     * @return Amount[] 
     */
    public function getDestinationBalanceChanges() {
        return $this->_DestinationBalanceChanges;
    }
    
    /**
     * Parsed from the validated transaction metadata, this array represents the changes to balances held by the destination_account. For those receiving payments this is important to check because if the partial_payment flag is set this value may be less than the destination_amount
     * @see RippleRestPayment::$destinationBalanceChanges
     * @see RippleRestPayment::getDestinationBalanceChanges
     * @param Amount[] $value 
     * @return null
     */
    public function setDestinationBalanceChanges($value) {
        try {
            if (!self::_checkArrayAmount($value)) throw new Exception("");
            $this->_DestinationBalanceChanges = self::_fromArrayAmount($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "Amount[]");
        }
    }
    
    /**
     * @internal
     */
    protected function initDestinationBalanceChanges($value) {
        $this->_DestinationBalanceChanges = self::_fromArrayAmount($value);
    }


    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
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
    
        $array["fee"] = self::_toFloatString($this->_Fee);
        if (is_null($array["fee"])) unset($array["fee"]);
    
        $array["source_balance_changes"] = self::_toArrayAmount($this->_SourceBalanceChanges);
        if (is_null($array["source_balance_changes"])) unset($array["source_balance_changes"]);
    
        $array["destination_balance_changes"] = self::_toArrayAmount($this->_DestinationBalanceChanges);
        if (is_null($array["destination_balance_changes"])) unset($array["destination_balance_changes"]);

        return $array;
    }


    /**
     * Client resource Id
     * @return string
     */
    public $clientResourceId;

}

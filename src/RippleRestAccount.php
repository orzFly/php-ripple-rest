<?php
/**
 * Contains class RippleRestAccount
 *
 * @license MIT
 */
 
/**
 * Account helper for RippleRest
 */
class RippleRestAccount {

    /**
     * Account's Address (rXXXXXX...)
     * @return string
     */
    public $address;
    
    /**
     * Account's secret
     * @return string
     */
    public $secret;
    
    /**
     * Create a new instance of RippleRestAccount.
     * @param string $address {@see RippleRestAccount::$address}
     * @param string $secret {@see RippleRestAccount::$secret}
     * @return RippleRestAccount
     */
    public function __construct($address, $secret = null) 
    {
        $this->address = $address;
        $this->secret = $secret;
    }
    
    /**
     * Get an account's existing balances.
     * This includes XRP balance (which does not include a counterparty) and trustline balances.
     * @return RippleRestBalance[]
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function getBalances()
    {
        $result = RippleRest::get("v1/accounts/" . $this->address . "/balances");
        return array_map(function($x) { return new RippleRestBalance($x); }, $result["balances"]);
    }
    
    /**
     * Returns Trustlines for this account.
     * @return RippleRestTrustline[]
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function getTrustlines()
    {
        $result = RippleRest::get("v1/accounts/" . $this->address . "/trustlines");
        return array_map(function($x) { return new RippleRestTrustline($x); }, $result["trustlines"]);
    }
    
    /**
     * Add trustline
     * @param mixed $obj Either a string representation of trustline limit, Hash containing value, currency, counterparty or a string form value/currency/counterparty.
     * @param boolean $allowRippling See [here](https://ripple.com/wiki/No_Ripple) for details
     * @throws Exception if secret is missing from the Account object
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     * @return array
     */
    public function addTrustline($obj, $allowRippling = true)
    {
        $this->requireSecret();
        
        $hash = array();
        $hash["allow_rippling"] = $allowRippling;
        $hash["secret"] = $this->secret;
        
        if (is_string($obj))
            $hash["trustline"] = array("limit" => $obj);
        else
            $hash["trustline"] = $obj->toArray();
        
        return RippleRest::post("v1/accounts/" . $this->address . "/trustlines", $hash);
    }
    
    /**
     * Returns a AccountSettings object for this account.
     * @return RippleRestAccountSettings
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function getSettings()
    {
        $result = RippleRest::get("v1/accounts/" . $this->address . "/settings");
        $obj = new RippleRestAccountSettings($result["settings"]);
        return $obj;
    }
    
    /**
     * Update this account's settings with a AccountSettings object.
     * @param RippleRestAccountSettings $obj
     * @return null
     * @throws Exception if secret is missing from the Account object
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function setSettings($obj)
    {
        $this->requireSecret();
        
        $hash = array();
        $hash["settings"] = $obj->toArray();
        $hash["secret"] = $this->secret;
        
        return RippleRest::post("v1/accounts/" . $this->address . "/settings", $hash);
    }
    
    /**
     * Get notifications.
     *
     * Clients using notifications to monitor their account activity should pay particular attention to the `state` and `result` fields. The `state` field will either be `validated` or `failed` and represents the finalized status of that transaction. The `result` field will be `tesSUCCESS` if the `state` was validated. If the transaction failed, `result` will contain the `rippled` or `ripple-lib` error code.
     *
     * Notifications have `next_notification_url` and `previous_notification_url`'s. Account notifications can be polled by continuously following the `next_notification_url`, and handling the resultant notifications, until the `next_notification_url` is an empty string. This means that there are no new notifications but, as soon as there are, querying the same URL that produced this notification in the first place will return the same notification but with the `next_notification_url` set.
     * @param string $hash
     * @return RippleRestNotification
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function getNotification($hash)
    {
        $result = RippleRest::get("v1/accounts/" . $this->address . "/notifications/" . $hash);
        $obj = new RippleRestNotification($result["notification"]);
        return $obj;
    }
    
    /**
     * Returns an individual payment.
     * @param string $hash Payment hash or client resource ID
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     * @return RippleRestPayment
     */
    public function getPayment($hash)
    {
        $result = RippleRest::get("v1/accounts/" . $this->address . "/payments/$hash");
        return new RippleRestPayment($result);
    }
    
    /**
     * Query `rippled` for possible payment "paths" through the Ripple Network to deliver the given amount to the specified `destination_account`. If the `destination_amount` issuer is not specified, paths will be returned for all of the issuers from whom the `destination_account` accepts the given currency.
     * @param mixed $destinationAccount [String, RippleRestAccount] destination account
     * @param mixed $destinationAmount [String, RippleRestAmount] destination amount
     * @param string[] $sourceCurrencies an array of source currencies that can be used to constrain the results returned (e.g. `["XRP", "USD+r...", "BTC+r..."]`) Currencies can be denoted by their currency code (e.g. USD) or by their currency code and issuer (e.g. `USD+r...`). If no issuer is specified for a currency other than XRP, the results will be limited to the specified currencies but any issuer for that currency will do.
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     * @return RippleRestPayment[]
     */
    public function findPaymentPaths($destinationAccount, $destinationAmount, $sourceCurrencies = null)
    {
        if ($destinationAccount instanceof RippleRestAccount)
            $destinationAccount = $destinationAccount->address;
            
        if ($destinationAmount instanceof RippleRestAmount)
            $destinationAmount = $destinationAmount->toString();
    
        $uri = "v1/accounts/" . $this->address . "/payments/paths/$destinationAccount/$destinationAmount";
        
        if (!is_null($sourceCurrencies))
        {
            $cur = implode(",", $sourceCurrencies);
            $uri .= "?$cur";
        }
        
        $result = RippleRest::get($uri);
        $data = $result["payments"];
        
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i] = new RippleRestPayment($data[$i]);
        }
        
        return $data;
    }
    
    /**
     * Create a RippleRestPayment object with some field filled.
     * @param RippleRestAccount $destinationAccount destination account
     * @param mixed $destinationAmount [String, RippleRestAmount] destination amount
     * @return RippleRestPayment
     */
    public function createPayment($destinationAccount, $destinationAmount)
    {
        if ($destinationAccount instanceof RippleRestAccount)
            $destinationAccount = $destinationAccount->address;
    
        $payment = new RippleRestPayment();
        $payment->sourceAccount = $this->address;
        $payment->destinationAccount = $destinationAccount;
        $payment->destinationAmount = RippleRestAmount::fromString($destinationAmount);
        return $payment;
    }
    
    /**
     * Submits a payment
     * @param RippleRestPaymeng $payment Payment object
     * @return string Client resource ID
     * @throws Exception if secret is missing from the Account object
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public function submitPayment($payment)
    {
        $this->requireSecret();
        
        $hash = array();
        $hash["payment"] = $payment->toArray();
        $hash["secret"] = $this->secret;
        $hash["client_resource_id"] = $payment->clientResourceId = RippleRest::createUUID();

        $result = RippleRest::post("v1/payments", $hash);
        return $payment->clientResourceId = $result["client_resource_id"];
    }
    
    /**
     * Browse historical payments in bulk.
     * @param array $options (Defaults to null) An assoc array with the following options:
     *   * `sourceAccount` [string, RippleRestAccount] If specified, limit the results to payments initiated by a particular account
     *   * `destinationAccount` [string, RippleRestAccount]  If specified, limit the results to payments made to a particular account
     *   * `excludeFailed` [boolean] if set to true, this will return only payment that were successfully validated and written into the Ripple Ledger
     *   * `startLedger` [string] If earliest_first is set to true this will be the index number of the earliest ledger queried, or the most recent one if earliest_first is set to false. Defaults to the first ledger the rippled has in its complete ledger. An error will be returned if this value is outside the rippled's complete ledger set
     *   * `endLedger` [string] If earliest_first is set to true this will be the index number of the most recent ledger queried, or the earliest one if earliest_first is set to false. Defaults to the last ledger the rippled has in its complete ledger. An error will be returned if this value is outside the rippled's complete ledger set
     *   * `earliestFirst` [boolean] Determines the order in which the results should be displayed. Defaults to true
     *   * `resultsPerPage` [int] Limits the number of resources displayed per page. Defaults to 20
     *   * `page` [int] : The page to be displayed. If there are fewer than the results_per_page number displayed, this indicates that this is the last page
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     * @return Payment[]
     */
    public function queryPayments($options = null)
    {
        $qs = array();
        $o = array();
        
        if (is_null($options)) $options = array();
        foreach ($options as $k => $v)
            $o[strtolower(str_replace("_", "", $k))] = $v;
        
        if (isset($o["sourceaccount"]))
            $qs['source_account'] = ($o["sourceaccount"] instanceof RippleRestAccount) ? $o["sourceaccount"]->address : $o["sourceaccount"];
            
        if (isset($o["destinationaccount"]))
            $qs['destination_account'] = ($o["destinationaccount"] instanceof RippleRestAccount) ? $o["destinationaccount"]->address : $o["destinationaccount"];
            
        if (isset($o['excludefailed'])) $qs['exclude_failed'] = $o['excludefailed'];
        if (isset($o['startledger'])) $qs['start_ledger'] = $o['startledger'];
        if (isset($o['endledger'])) $qs['end_ledger'] = $o['endledger'];
        if (isset($o['earliestfirst'])) $qs['earliest_first'] = $o['earliestfirst'];
        if (isset($o['resultsperpage'])) $qs['results_per_page'] = $o['resultsperpage'];
        if (isset($o['page'])) $qs['page'] = $o['page'];
        
        if (count($qs) > 0)
            $querystring = "?" . http_build_query($qs);
        else
            $querystring = "";
        
        $uri = "v1/accounts/" . $this->address . "/payments$querystring";
        
        $result = RippleRest::get($uri);
        $data = $result["payments"];
        
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i] = new RippleRestPayment($data[$i]["payment"]);
            $data[$i]->clientResourceId = $data[$i]["client_resource_id"];
        }
        
        return $data;
    }
    
    /**
     * @internal
     * @throws Exception if secret is missing from the Account object
     */
    private function requireSecret()
    {
        if (is_null($this->secret))
            throw new Exception("Secret is required for this operation.");
    }
}
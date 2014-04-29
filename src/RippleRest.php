<?php
/**
 * Contains class RippleRest
 *
 * @license MIT
 */

/**
 * Ripple Rest Client for PHP.
 */
class RippleRest {
    /**
     * @internal
     */
    protected static $endpoint = null;
    
    /**
     * @internal
     */
    protected static $client = null;
    
    /**
     * Set endpoint URI
     * @param string $endpoint "http://localhost:5990/"
     */
    public static function setup($endpoint)
    {
        self::$endpoint = preg_replace('`/$`', '', $endpoint);
    }
    
    /**
     * Retrieve the details of a transaction in the standard Ripple JSON format. 
     * @param string $hash transaction hash
     * @return array See the Ripple Wiki page on [Transaction Formats](https://ripple.com/wiki/Transactions) for more information.
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public static function getTransaction($hash)
    {
        $result = self::get("v1/transactions/$hash");
        return $result["transaction"];
    }
    
    /**
     * A simple endpoint that can be used to check if ripple-rest is connected to a rippled and is ready to serve. If used before querying the other endpoints this can be used to centralize the logic to handle if rippled is disconnected from the Ripple Network and unable to process transactions.
     * @return boolean true if `ripple-rest` is ready to serve
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public static function isServerConnected()
    {
        $result = self::get("v1/server/connected");
        return $result["connected"];
    }
    
    /**
     * Retrieve information about the ripple-rest and connected rippled's current status.
     * @return array https://github.com/ripple/ripple-rest/blob/develop/docs/api-reference.md#get-server-info
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public static function getServerInfo()
    {
        return self::get("v1/server");
    }
    
    /**
     * A UUID v4 generator.
     * @return string "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx"
     * @throws RippleRestError if RippleRest server returns an error
     * @throws RippleRestProtocolError if protocol is wrong or network is down
     */
    public static function createUUID()
    {
        $result = self::get("v1/uuid");
        return $result["uuid"];
    }
    
    /**
     * @internal
     */
    private static function getClient()
    {
        if (!is_null(self::$client)) return self::$client;
        
        if (RippleRestClientCURL::isAvailable())
            return self::$client = new RippleRestClientCURL();
          
        if (RippleRestClientURLFileOpen::isAvailable())
            return self::$client = new RippleRestClientURLFileOpen();
            
        throw new RippleRestProtocolError("There is no Client available. Please try install cURL or turn on 'allow_url_fopen'.");
    }
    
    /**
     * @internal
     */
    public static function get($uri)
    {
        return self::wrapError(function() use($uri) {
            return self::getClient()->get(self::$endpoint . "/$uri");
        });
    }
    
    /**
     * @internal
     */
    public static function post($uri, $body)
    {
        return self::wrapError(function() use($uri, $body) {
            return self::getClient()->post(self::$endpoint . "/$uri", $body);
        });
    }
    
    /**
     * @internal
     */
    private static function wrapError($callback)
    {
        if(is_null(self::$endpoint))
        {
            throw new RippleRestProtocolError("You have to setup RippleRest first.");
        }
        
        $response = $callback();
        
        $json = json_decode($response, true);
        if (!is_null($json) && !$json["success"])
        {
            $ex = new RippleRestError(isset($json["message"]) ? $json["message"] : isset($json["error"]) ? $json["error"] : json_encode($json));
            $ex->error = $json;
            throw $ex;
        }
      
        return is_null($json) ? $response : $json;
    }
}
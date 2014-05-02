<?php
spl_autoload_register(function($name) {
    if(is_file("src/$name.php"))
        require_once("src/$name.php");
});

RippleRest::setup("http://localhost:5990");

var_dump(RippleRest::isServerConnected());
var_dump(RippleRest::getServerInfo());
var_dump(RippleRest::createUUID());
var_dump(RippleRest::getTransaction("A29DED58C4EA3D04FD4501108AB9AE6EBEF3249E892E34A2351C4A1A1A88E90B"));

$account = new RippleRestAccount("rES1hSkoWauMk3r6sgh7zfjpTCnwGbqaxA", "sSECRET");
var_dump($account->getBalances());

var_dump($account->getSettings());

var_dump($account->getTrustlines());
/* $account->addTrustline(array(
    "limit" => 5,
    "currency" => "ICE",
    "counterparty" => "r4H3F9dDaYPFwbrUsusvNAHLz2sEZk4wE5"
)); */

var_dump($account->getNotification("DD9F40516152090612B12F1CCD5A88828AEA8813FEBD56D9D6B39ED918F4CCCA"));
var_dump($account->findPaymentPaths("rhtgn6PYbXwhA6QJJMY4btieoap31t7Uo8", "5+ICE+rES1hSkoWauMk3r6sgh7zfjpTCnwGbqaxA"));
var_dump($account->queryPayments(array( "resultsPerPage" => 10 )));

$payment = $account->createPayment("rES1hSkoWauMk3r6sgh7zfjpTCnwGbqaxA", "5+XRP");
$account->submitPayment($payment);
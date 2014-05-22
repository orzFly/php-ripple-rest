RippleRest PHP Client
=====================

This is a client that interacts with the Ripple network using the Ripple REST APIs.

This library can be used directly by include all classes directly, or by Composer: [![PHP version](https://badge.fury.io/ph/orzfly%2Fphp-ripple-rest.svg)](http://badge.fury.io/ph/orzfly%2Fphp-ripple-rest)


```php
RippleRest::setup("http://localhost:5990");

var_dump(RippleRest::isServerConnected());
var_dump(RippleRest::getServerInfo());
var_dump(RippleRest::createUUID());

$account = new RippleRestAccount("rES1hSkoWauMk3r6sgh7zfjpTCnwGbqaxA", "sSECRET");
var_dump($account->getBalances());
var_dump($account->getSettings());
var_dump($account->getNotification("DD9F40516152090612B12F1CCD5A88828AEA8813FEBD56D9D6B39ED918F4CCCA"));

$payment = $account->createPayment("rES1hSkoWauMk3r6sgh7zfjpTCnwGbqaxA", "5+XRP");
$account->submitPayment($payment);
```

# jumpcloud-auth
Simple Library to Authenicate via Jumpclouds REST API 

## Authorization API
http://support.jumpcloud.com/knowledgebase/articles/455570

## Examples
```
<?php

require __DIR__ . '/../vendor/autoload.php';

$provider = new \JumpCloud\Provider\CredentialsProvider('api-key');
$client = new \JumpCloud\Client($provider);

$response = $client->authenticate('username', 'password');

if ($response->isAuthorized()) {
    echo 'Authorized!';
} else {
    echo 'Not Authorized!';
}
```

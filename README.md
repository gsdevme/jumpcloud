# jumpcloud
Jumpcloud API

[![Build Status](https://travis-ci.org/gsdevme/jumpcloud.svg?branch=develop)](https://travis-ci.org/gsdevme/jumpcloud)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=develop)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=master)

## Authorization API
http://support.jumpcloud.com/knowledgebase/articles/455570

## Examples
```
require __DIR__ . '/../vendor/autoload.php';

$provider = new \JumpCloud\Provider\CredentialsProvider('my-api-key');
$client = new \JumpCloud\Client($provider);

$operation = new \JumpCloud\Operation\Authenticate('username', 'password');

/** @var \JumpCloud\Authorization\AuthorizationResponse $response */
$response = $client->send($operation);

if ($response->isAuthorized()) {
    echo 'Authorized!';
} else {
    echo 'Not Authorized!';
}
```

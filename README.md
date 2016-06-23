# jumpcloud
Jumpcloud API

### Master
[![Build Status](https://travis-ci.org/gsdevme/jumpcloud.svg?branch=master)](https://travis-ci.org/gsdevme/jumpcloud)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/440d2b0e-5a6f-441d-adfc-485cf933c19b/small.png)](https://insight.sensiolabs.com/projects/440d2b0e-5a6f-441d-adfc-485cf933c19b)
[![Code Coverage](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=master)

### Develop
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=develop)
[![Build Status](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/build-status/develop)
[![Code Coverage](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/gsdevme/jumpcloud/?branch=develop)


## Authorization API
http://support.jumpcloud.com/knowledgebase/articles/455570

## API
https://github.com/TheJumpCloud/JumpCloudAPI

## Examples
```
// login
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


```
// Get all systems
require __DIR__ . '/../vendor/autoload.php';

$provider = new \JumpCloud\Provider\CredentialsProvider('my-api-key');
$client = new \JumpCloud\Client($provider);

$operation = new \JumpCloud\Operation\Systems();

/** @var \JumpCloud\Response\MultiformatResponse $response */
$response = $client->send($operation);

print_r($response->getData());
```

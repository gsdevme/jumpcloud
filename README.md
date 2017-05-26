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
<?php

require __DIR__ . '/../vendor/autoload.php';

use Jumpcloud\Model\JumpcloudCredentials;
use Jumpcloud\Request\IsAuthenticatedRequest;
use Gsdev\Fabric\Bridge\Guzzle\GuzzleClient;
use Jumpcloud\Response\IsAuthenticatedResponse;

$client = new GuzzleClient();

$credentials = new JumpcloudCredentials(getenv('JUMPCLOUD_API_KEY'));

$request = new IsAuthenticatedRequest($credentials, 'username', 'password1234');

$response = $client->send($request);

if ($response instanceof IsAuthenticatedResponse && $response->isAuthenticated()) {
    echo 'Authenticated';
} else {
    echo 'Not Authenticated';
}
```

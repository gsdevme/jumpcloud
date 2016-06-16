<?php

namespace JumpCloud;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response as HttpResponse;
use JumpCloud\Response\AuthorizationResponse;
use JumpCloud\Operation\Authenticate;
use JumpCloud\Provider\CredentialsProvider;
use Mockery as m;

class ClientAuthenticateTest extends \PHPUnit_Framework_TestCase
{
    public function testClient()
    {
        $mock = new MockHandler(
            [
                new HttpResponse(200)
            ]
        );
        $handler = HandlerStack::create($mock);

        $guzzle = new GuzzleClient(
            [
                'timeout' => 5,
                'connection_timeout' => 2,
                'handler' => $handler
            ]
        );

        $client = new Client(
            new CredentialsProvider('api-key-123'),
            null,
            $guzzle
        );

        /** @var AuthorizationResponse $response */
        $response = $client->send(new Authenticate('gavin', 'qwerty'));
        $this->assertTrue($response->isAuthorized());
    }

    /**
     * @dataProvider getTestData
     */
    public function testReturnCodes($code, $result)
    {
        $mock = new MockHandler(
            [
                new HttpResponse($code)
            ]
        );
        $handler = HandlerStack::create($mock);

        $guzzle = new GuzzleClient(
            [
                'timeout' => 5,
                'connection_timeout' => 2,
                'handler' => $handler
            ]
        );

        $client = new Client(
            new CredentialsProvider('api-key-123'),
            null,
            $guzzle
        );

        /** @var AuthorizationResponse $response */
        $response = $client->send(new Authenticate('gavin', 'qwerty'));
        $this->assertEquals($result, $response->isAuthorized());
    }

    public function getTestData()
    {
        return [
            [200, true],
            [401, false],
            [500, false],
            [501, false],
            [201, false],
        ];
    }


}

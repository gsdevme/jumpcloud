<?php

namespace JumpCloud;

use JumpCloud\Provider\CredentialsProvider;
use JumpCloud\Provider\CredentialsProviderInterface;
use JumpCloud\Request\RequestInterface;
use JumpCloud\Factory\ResponseFactoryInterface;
use JumpCloud\Response\ResponseInterface;
use Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var CredentialsProvider
     */
    private $provider;

    public function setUp()
    {
        $this->provider = m::mock(CredentialsProviderInterface::class)->shouldIgnoreMissing();
        $this->client = new Client($this->provider);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }

    public function testSend()
    {
        $this->provider->shouldReceive('getKey')->andReturn('wiggle');

        /** @var RequestInterface $request */
        $request = m::mock(RequestInterface::class);

        $request
            ->shouldReceive('addHeader')
            ->withArgs(['x-api-key', 'wiggle']);

        $request
            ->shouldReceive('addHeader')
            ->withArgs(['content-type', 'application/json']);

        $request
            ->shouldReceive('getHeaders')
            ->andReturn(['x-api-key', 'wiggle']);

        $factory = m::mock(ResponseFactoryInterface::class);

        $factory
            ->shouldReceive('create')
            ->andReturn(m::mock(ResponseInterface::class));

        $request
            ->shouldReceive('getResponseFactory')
            ->andReturn($factory);


        $response = $this->client->send($request);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}

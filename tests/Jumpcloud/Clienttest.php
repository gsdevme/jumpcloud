<?php

namespace JumpCloud;

use JumpCloud\Provider\CredentialsProviderInterface;
use Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new Client(m::mock(CredentialsProviderInterface::class));
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }
}

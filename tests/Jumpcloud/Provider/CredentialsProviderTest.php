<?php

namespace JumpCloud\Provider;

use Mockery as m;

/**
 * Class CredentialsProviderTest
 * @package JumpCloud\Provider
 */
class CredentialsProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(CredentialsProvider::class, new CredentialsProvider('test'));
    }

    public function testSetkey()
    {
        $credentialsProvider = new CredentialsProvider('test');

        $this->assertEquals('test', $credentialsProvider->getKey());

        $credentialsProvider->setKey('wiggle');

        $this->assertEquals('wiggle', $credentialsProvider->getKey());
    }

}

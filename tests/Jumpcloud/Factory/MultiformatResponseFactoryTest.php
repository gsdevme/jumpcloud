<?php

namespace JumpCloud\Factory;

use GuzzleHttp\Psr7\Response;
use JumpCloud\Response\ResponseInterface;
use Mockery as m;

/**
 * Class MultiformatResponseFactoryTest
 * @package JumpCloud\Factory
 */
class MultiformatResponseFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function assertInstance()
    {
        $this->assertInstanceOf(MultiformatResponseFactory::class, new MultiformatResponseFactory());
    }

    public function testCreation()
    {
        $factory = new MultiformatResponseFactory();
        $response = $factory->create(new Response());

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}

<?php

namespace JumpCloud\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Response::class, new Response(new \GuzzleHttp\Psr7\Response()));
    }
}

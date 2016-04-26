<?php

namespace JumpCloud;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Response::class, new Response(true));
    }
}

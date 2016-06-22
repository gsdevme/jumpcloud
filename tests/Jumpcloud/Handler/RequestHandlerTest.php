<?php

namespace JumpCloud\Handler;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(RequestHandler::class, new RequestHandler());
    }
}

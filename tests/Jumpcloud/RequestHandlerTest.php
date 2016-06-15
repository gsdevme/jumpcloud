<?php

namespace JumpCloud;

use JumpCloud\Request\RequestHandler;

class RequestHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(RequestHandler::class, new RequestHandler());
    }
}

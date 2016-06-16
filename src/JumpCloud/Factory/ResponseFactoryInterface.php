<?php

namespace JumpCloud\Factory;

use GuzzleHttp\Psr7\Response;

interface ResponseFactoryInterface
{
    public function create(Response $response);
}

<?php

namespace JumpCloud\Factory;

use GuzzleHttp\Psr7\Response;
use JumpCloud\Response\ResponseInterface;

interface ResponseFactoryInterface
{
    /**
     * @param Response $response
     * @return ResponseInterface
     */
    public function create(Response $response);
}

<?php

namespace JumpCloud\Factory;

use GuzzleHttp\Psr7\Response;
use JumpCloud\Response\MultiformatResponse;

/**
 * Class MultiformatResponseFactory
 * @package JumpCloud\Authorization
 */
class MultiformatResponseFactory implements ResponseFactoryInterface
{
    /**
     * @param Response $response
     * @return MultiformatResponse
     */
    public function create(Response $response)
    {
        return new MultiformatResponse($response);
    }
}

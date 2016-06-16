<?php

namespace JumpCloud\Factory;

use GuzzleHttp\Psr7\Response;
use JumpCloud\Response\AuthorizationResponse;

/**
 * Class AuthorizationResponseFactory
 * @package JumpCloud\Factory
 */
class AuthorizationResponseFactory implements ResponseFactoryInterface
{
    /**
     * @param Response $response
     * @return AuthorizationResponse
     */
    public function create(Response $response)
    {
        if ($response->getStatusCode() === 200) {
            return new AuthorizationResponse($response, AuthorizationResponse::AUTHORISED);
        }

        return new AuthorizationResponse($response, AuthorizationResponse::UNAUTHORISED);
    }
}

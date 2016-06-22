<?php

namespace JumpCloud\Operation;

use JumpCloud\Request\AuthorizationRequestInterface;
use JumpCloud\Factory\AuthorizationResponseFactory;
use JumpCloud\Request\Request;
use JumpCloud\Request\RequestInterface;

/**
 * Class Authenticate
 * @package JumpCloud\Operation
 */
class Authenticate implements RequestInterface, AuthorizationRequestInterface
{
    use RequestOperationTrait;

    /**
     * Authenticate constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $request = new Request();
        $request->setBody(
            [
                'username' => $username,
                'password' => $password
            ]
        );

        $request->setUri(AuthorizationRequestInterface::ENDPOINT);
        $request->setResponseFactory(new AuthorizationResponseFactory());

        $this->request = $request;
    }
}

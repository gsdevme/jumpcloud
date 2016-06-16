<?php

namespace JumpCloud\Operation;

use JumpCloud\Request\AuthorizationRequestInterface;
use JumpCloud\Factory\AuthorizationResponseFactory;
use JumpCloud\Request\Request;
use JumpCloud\Request\RequestInterface;

/**
 * Class Authorization
 * @package JumpCloud\Operation
 */
class Authorization implements RequestInterface, AuthorizationRequestInterface
{
    use RequestOperationTrait;

    /**
     * Authorization constructor.
     * @param $username
     * @param $password
     * @param $tag
     */
    public function __construct($username, $password, $tag)
    {
        $request = new Request();
        $request->setBody(
            [
                'username' => $username,
                'password' => $password,
                'tag' => $tag
            ]
        );

        $request->setUri(AuthorizationRequestInterface::ENDPOINT);
        $request->setResponseFactory(new AuthorizationResponseFactory());

        $this->request = $request;
    }
}

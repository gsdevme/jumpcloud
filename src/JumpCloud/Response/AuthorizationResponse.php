<?php

namespace JumpCloud\Response;

use GuzzleHttp\Psr7\Response as HttpResponse;

/**
 * Class AuthorizationResponse
 * @package JumpCloud\Response
 */
class AuthorizationResponse implements ResponseInterface
{
    use ResponseTrait;

    const AUTHORISED = true;
    const UNAUTHORISED = false;

    /**
     * @var bool
     */
    private $authorized;

    /**
     * AuthorizationResponse constructor.
     * @param HttpResponse $response
     * @param $authorized
     */
    public function __construct(HttpResponse $response, $authorized)
    {
        $this->response = $response;
        $this->authorized = $authorized;
    }

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->authorized;
    }
}

<?php

namespace JumpCloud\Response;

use GuzzleHttp\Psr7\Response as HttpResponse;

class Response implements ResponseInterface
{
    private $response;

    /**
     * Response constructor.
     * @param HttpResponse $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->response = $response;
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }
}

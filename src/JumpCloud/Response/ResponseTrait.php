<?php

namespace JumpCloud\Response;

use GuzzleHttp\Psr7\Response as HttpResponse;

trait ResponseTrait
{
    /** @var HttpResponse */
    protected $response;

    /**
     * @return \GuzzleHttp\Psr7\Stream|\Psr\Http\Message\StreamInterface
     */
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

<?php

namespace JumpCloud\Response;

use GuzzleHttp\Psr7\Response as HttpResponse;

class Response implements ResponseInterface
{
    use ResponseTrait;

    /**
     * Response constructor.
     * @param HttpResponse $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->response = $response;
    }
}

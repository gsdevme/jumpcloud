<?php

namespace JumpCloud\Builder;


use JumpCloud\Response;
use Psr\Http\Message\ResponseInterface;

class ResponseBuilder
{
    private $response;

    /**
     * ResponseBuilder constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function build()
    {
        if ($this->response->getStatusCode() === 200) {
            return new Response();
        }
    }
}

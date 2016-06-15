<?php

namespace JumpCloud\Response;

class ExceptionResponse implements ResponseInterface
{
    private $code;
    private $body;

    /**
     * Response constructor.
     * @param $message
     * @param $code
     */
    public function __construct($message, $code)
    {
        $this->body = ['message' => $message];
        $this->code = $code;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode()
    {
        return $this->code;
    }
}

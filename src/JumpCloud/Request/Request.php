<?php

namespace JumpCloud\Request;

use JumpCloud\Factory\ResponseFactoryInterface;

class Request implements RequestInterface
{
    /** @var  string */
    private $method;

    /** @var string */
    private $uri;

    /** @var array */
    private $headers;

    /** @var array */
    private $body;

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->method = 'GET';
        $this->headers = [];
        $this->body = null;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $header
     * @param $value
     */
    public function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param array $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return ResponseFactoryInterface
     */
    public function getResponseFactory()
    {
        return $this->responseFactory;
    }

    /**
     * @param ResponseFactoryInterface $responseFactory
     */
    public function setResponseFactory(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

}

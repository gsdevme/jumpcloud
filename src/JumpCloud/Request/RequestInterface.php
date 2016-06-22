<?php

namespace JumpCloud\Request;

use JumpCloud\Factory\ResponseFactoryInterface;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param string $header
     * @param string $value
     */
    public function addHeader($header, $value);

    /**
     * @return array
     */
    public function getBody();

    /**
     * @return ResponseFactoryInterface
     */
    public function getResponseFactory();


}

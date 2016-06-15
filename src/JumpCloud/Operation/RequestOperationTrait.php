<?php

namespace JumpCloud\Operation;

use JumpCloud\Request\RequestInterface;

/**
 * Class RequestOperationTrait
 * @package JumpCloud\Operation
 */
trait RequestOperationTrait
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return $this->request->getMethod();
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return $this->request->getUri();
    }

    /**
     * @inheritDoc
     */
    public function getHeaders()
    {
        return $this->request->getHeaders();
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return $this->request->getBody();
    }

    /**
     * @inheritDoc
     */
    public function addHeader($header, $value)
    {
        $this->request->addHeader($header, $value);
    }

    /**
     * @inheritDoc
     */
    public function getResponseFactory()
    {
        return $this->request->getResponseFactory();
    }
}

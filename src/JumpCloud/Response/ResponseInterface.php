<?php

namespace JumpCloud\Response;

interface ResponseInterface
{
    public function getBody();

    /**
     * @return int
     */
    public function getStatusCode();

}

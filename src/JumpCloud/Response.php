<?php

namespace JumpCloud;

/**
 * Class Response
 *
 * @package JumpCloud
 */
class Response
{
    const AUTHORISED   = true;
    const UNAUTHORISED = false;

    /** @var bool */
    private $authorized;

    /**
     * Response constructor.
     *
     * @param bool $authorized
     */
    public function __construct($authorized)
    {
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

<?php

namespace JumpCloud\Provider;

/**
 * Class CredentialsProvider
 *
 * @package JumpCloud
 */
class CredentialsProvider implements CredentialsProviderInterface
{
    /** @var string */
    private $key;

    /**
     * Credentials constructor.
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @inheritdoc
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}

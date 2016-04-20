<?php

namespace JumpCloud\Provider;

/**
 * Interface CredentialsProviderInterface
 *
 * @package JumpCloud
 */
interface CredentialsProviderInterface
{
    /**
     * @return string
     */
    public function getKey();
}

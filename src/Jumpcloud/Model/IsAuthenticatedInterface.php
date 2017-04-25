<?php declare(strict_types=1);

namespace Jumpcloud\Model;

interface IsAuthenticatedInterface
{
    public function isAuthenticated(): bool;
}

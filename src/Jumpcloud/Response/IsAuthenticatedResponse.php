<?php declare(strict_types = 1);

namespace Jumpcloud\Response;

use Gsdev\Fabric\Model\Response\ResponseInterface;
use Gsdev\Fabric\Model\Response\ResponseResourceInterface;
use Jumpcloud\Model\IsAuthenticatedInterface;

class IsAuthenticatedResponse implements IsAuthenticatedInterface, ResponseResourceInterface, ResponseInterface
{
    /**
     * @var bool
     */
    private $isAuthenticated;

    public function __construct(bool $isAuthenticated)
    {
        $this->isAuthenticated = $isAuthenticated;
    }

    public function isAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }

    public static function createFromResponseData($data): ?ResponseInterface
    {
        $isAuthenticated = isset($data['data']) && $data['data'] === 'OK' . PHP_EOL;

        return new self($isAuthenticated);
    }
}

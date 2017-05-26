<?php declare(strict_types=1);

namespace Jumpcloud\Validator;

use Gsdev\Fabric\Model\Request\RequestInterface;
use Gsdev\Fabric\Model\Validator\ValidatorInterface;
use Psr\Http\Message\ResponseInterface;

class IsSuccessfulResponseCodeValidator implements ValidatorInterface
{
    public function isValidResponseData(RequestInterface $request, $response): bool
    {
        if (!$response instanceof ResponseInterface) {
            return false;
        }

        return $response->getStatusCode() === 200;
    }
}

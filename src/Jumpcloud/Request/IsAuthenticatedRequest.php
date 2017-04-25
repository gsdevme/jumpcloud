<?php declare(strict_types = 1);

namespace Jumpcloud\Request;

use Gsdev\Fabric\Component\Request\PostRequestTrait;
use Gsdev\Fabric\Model\Request\BodyRequestInterface;
use Gsdev\Fabric\Model\Request\HeaderRequestInterface;
use Gsdev\Fabric\Model\Request\RequestInterface;
use Gsdev\Fabric\Model\Request\RequestOptionsInterface;
use Gsdev\Fabric\Model\Request\RequestResponseInterface;
use Jumpcloud\Model\JumpcloudCredentials;
use Jumpcloud\Response\IsAuthenticatedResponse;

class IsAuthenticatedRequest implements
    RequestInterface,
    HeaderRequestInterface,
    BodyRequestInterface,
    RequestResponseInterface,
    RequestOptionsInterface
{
    use PostRequestTrait;

    /**
     * @var JumpcloudCredentials
     */
    private $credentials;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var null|string
     */
    private $tag;

    public function __construct(
        JumpcloudCredentials $credentials,
        string $username,
        string $password,
        ?string $tag = null
    ) {
        $this->credentials = $credentials;
        $this->username = $username;
        $this->password = $password;
        $this->tag = $tag;
    }

    public function getUri(): string
    {
        return 'https://auth.jumpcloud.com/authenticate';
    }

    public function getHeaders(): array
    {
        return [
            'content-type' => 'application/json',
            'x-api-key'    => $this->credentials->getKey(),
        ];
    }

    public function getBody(): string
    {
        $body = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if (null !== $this->tag) {
            $body['tag'] = $this->tag;
        }

        return json_encode($body);
    }

    public function getResponseResource(): string
    {
        return IsAuthenticatedResponse::class;
    }

    public function getOptions(): array
    {
        return [
            'exceptions' => false,
        ];
    }
}

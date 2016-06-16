<?php

namespace JumpCloud;

use GuzzleHttp\Client as GuzzleClient;
use JumpCloud\Provider\CredentialsProviderInterface;
use JumpCloud\Handler\RequestHandler;
use JumpCloud\Request\RequestInterface;
use JumpCloud\Response\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class Client
 *
 * @package JumpCloud
 */
class Client
{
    /** @var CredentialsProviderInterface */
    private $credentialsProvider;

    /** @var LoggerInterface */
    private $logger;

    /** @var GuzzleClient */
    private $client;

    /** @var RequestHandler */
    private $requesthandler;

    /**
     * Client constructor.
     *
     * @param CredentialsProviderInterface $credentialsProvider
     * @param LoggerInterface|null $logger
     * @param GuzzleClient|null $client
     */
    public function __construct(
        CredentialsProviderInterface $credentialsProvider,
        LoggerInterface $logger = null,
        GuzzleClient $client = null
    )
    {
        $this->credentialsProvider = $credentialsProvider;
        $this->logger = $logger ?: new NullLogger();

        $this->client = $client ?: new GuzzleClient(
            [
                'timeout' => 5,
                'connection_timeout' => 2,
            ]
        );

        $this->requesthandler = new RequestHandler($this->logger);
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        $request->addHeader('x-api-key', $this->credentialsProvider->getKey());
        $request->addHeader('content-type', 'application/json');

        return $this->requesthandler->handle($this->client, $request);
    }
}

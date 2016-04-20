<?php

namespace JumpCloud;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class RequestHandler
 *
 * @package JumpCloud
 */
class RequestHandler
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * RequestHandler constructor.
     *
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?: new NullLogger();
    }

    /**
     * @param Client  $client
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Client $client, Request $request)
    {
        $response = $client->send($request);

        if ($response->getStatusCode() === 200) {
            return new Response(Response::AUTHORISED);
        }

        return new Response(Response::UNAUTHORISED);
    }
}

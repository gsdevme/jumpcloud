<?php

namespace JumpCloud\Request;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\Psr7\Response;
use JumpCloud\Response\ResponseInterface;
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
     * @param GuzzleClient $client
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function handle(GuzzleClient $client, RequestInterface $request)
    {
        try {
            $response = $client->send(
                new HttpRequest(
                    $request->getMethod(),
                    $request->getUri(),
                    $request->getHeaders(),
                    \GuzzleHttp\json_encode($request->getBody())
                )
            );
        } catch (\Exception $e) {
            $response = new Response(500);

            if ($e instanceof ClientException) {
                $response = new Response(401);
            }
        }

        return $request->getResponseFactory()->create($response);
    }
}

<?php

namespace JumpCloud\Handler;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\Psr7\Response;
use JumpCloud\Request\RequestInterface;
use JumpCloud\Response\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Webmozart\Json\JsonEncoder;

/**
 * Class RequestHandler
 *
 * @package JumpCloud
 */
class RequestHandler
{
    /**
     * @var NullLogger
     */
    private $logger;

    /**
     * @var JsonEncoder
     */
    private $jsonEncoder;

    /**
     * RequestHandler constructor.
     *
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?: new NullLogger();
        $this->jsonEncoder = new JsonEncoder();
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
                    $this->jsonEncoder->encode($request->getBody())
                )
            );
        } catch (\Exception $e) {
            $this->logger->debug(
                sprintf('Exception thrown during Guzzle request'),
                [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile(),
                    'trace' => $e->getTraceAsString()
                ]
            );

            $response = new Response(500);

            if ($e instanceof ClientException) {
                $response = new Response(401);
            }
        }

        return $request->getResponseFactory()->create($response);
    }
}

<?php

namespace JumpCloud;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response as HttpResponse;
use JumpCloud\Builder\ResponseBuilder;
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
     * @param Request      $request
     *
     * @return Response
     */
    public function handle(GuzzleClient $client, Request $request)
    {
        try{
            $response = $client->send($request);
        } catch (\Exception $e) {
            $response = new HttpResponse(401);

            if ($e instanceof ServerException) {
                $this->logger->info(sprintf('Failed to authenticate as Jumpcloud is returning a 5xx http code'));
            }

            if ($e instanceof ConnectException) {
                $this->logger->info(sprintf('Failed to authenticate as the connection to jumpcloud is failing'));
            }
        }

        return (new ResponseBuilder($response))->build();
    }
}

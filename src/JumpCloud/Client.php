<?php

namespace JumpCloud;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use JumpCloud\Builder\RequestBuilder;
use JumpCloud\Provider\CredentialsProviderInterface;
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
     * @param LoggerInterface|null         $logger
     * @param GuzzleClient|null            $client
     */
    public function __construct(
        CredentialsProviderInterface $credentialsProvider,
        LoggerInterface $logger = null,
        GuzzleClient $client = null
    ) {
        $this->credentialsProvider = $credentialsProvider;
        $this->logger = $logger ?: new NullLogger();

        $this->client = $client ?: new GuzzleClient(
            [
                'timeout'            => 5,
                'connection_timeout' => 2,
            ]
        );

        $this->requesthandler = new RequestHandler($this->logger);
    }

    /**
     * Performs authentication only, and checks to see if the user exists in your JumpCloud directory with the
     * given user name and password (this is similar to doing a raw bind to the JumpCloud Hosted LDAP Service).
     *
     * @param $username
     * @param $password
     *
     * @return Response
     */
    public function authenticate($username, $password)
    {
        $request = (new RequestBuilder($this->credentialsProvider->getKey(), $username, $password))->build();

        $this->logger->debug(
            'Jumpcloud authenticate for user',
            [
                'username' => $username,
            ]
        );

        return $this->handleRequest($request);
    }

    /**
     * Performs both authentication and authorization for the user, by allowing to you check to see if the user is
     * part of a tag in your account. Tags are akin to "roles", so membership in a tag can be considered to provide
     * additional access. This is similar to binding to JumpCloud's Hosted LDAP Service as an LDAP Binding User and
     * looking at the memberOf field on the particular user to see of which groups the user is part.
     *
     * @param $username
     * @param $password
     * @param $tag
     *
     * @return Response
     */
    public function authorization($username, $password, $tag)
    {
        $request = (new RequestBuilder($this->credentialsProvider->getKey(), $username, $password, $tag))->build();

        $this->logger->debug(
            'Jumpcloud authorization for user with tag',
            [
                'username' => $username,
                'tag'      => $tag,
            ]
        );

        return $this->handleRequest($request);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    private function handleRequest(Request $request)
    {
        return $this->requesthandler->handle($this->client, $request);
    }
}

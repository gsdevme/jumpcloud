<?php

namespace JumpCloud\Builder;

use GuzzleHttp\Psr7\Request;

class RequestBuilder
{
    const ENDPOINT = 'https://auth.jumpcloud.com/authenticate';

    /** @var string */
    private $key;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string|null */
    private $tag;

    /** @var string */
    private $endpoint;

    /**
     * RequestBuilder constructor.
     *
     * @param      $key
     * @param      $username
     * @param      $password
     * @param null $tag
     */
    public function __construct($key, $username, $password, $tag = null)
    {
        $this->key = $key;
        $this->username = $username;
        $this->password = $password;
        $this->tag = $tag;
        $this->endpoint = self::ENDPOINT;
    }

    /**
     * @param $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return Request
     */
    public function build()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'x-api-key'    => $this->key,
        ];

        $body = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if ($this->tag !== null) {
            $body['tag'] = $this->tag;
        }

        return new Request('POST', $this->endpoint, $headers, json_encode($body));
    }
}

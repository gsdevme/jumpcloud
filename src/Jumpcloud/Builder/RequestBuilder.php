<?php

namespace JumpCloud\Builder;

use GuzzleHttp\Psr7\Request;

class RequestBuilder
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string|null */
    private $tag;

    /**
     * RequestBuilder constructor.
     *
     * @param      $username
     * @param      $password
     * @param null $tag
     */
    public function __construct($username, $password, $tag = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->tag = $tag;
    }

    /**
     * @return Request
     */
    public function build()
    {
        $headers = [
            'X-Client' => Request::class,
            'Content-Type' => 'application/json'
        ];

        $body = [
            'username' => $this->username,
            'password' => $this->password
        ];

        if ($this->tag !== null) {
            $body['tag'] = $this->tag;
        }

        return new Request('POST', 'https://auth.jumpcloud.com/authenticate', $headers, $body);
    }
}

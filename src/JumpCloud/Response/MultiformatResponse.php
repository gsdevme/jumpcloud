<?php

namespace JumpCloud\Response;

use GuzzleHttp\Psr7\Response as HttpResponse;
use Webmozart\Json\JsonDecoder;

class MultiformatResponse implements ResponseInterface
{
    use ResponseTrait;

    /**
     * @var
     */
    private $data;

    /**
     * @var int
     */
    private $total;

    /**
     * @var JsonDecoder
     */
    private $jsonDecoder;

    /**
     * Response constructor.
     * @param HttpResponse $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->response = $response;
        $this->data = false;
        $this->jsonDecoder = new JsonDecoder();
    }

    public function getData()
    {
        if ($this->data === false) {
            $this->handleResponse();
        }

        return $this->data;
    }

    public function getTotal()
    {
        if ($this->total === null) {
            $this->handleResponse();
        }

        return $this->total;
    }

    /**
     * @throws \Webmozart\Json\ValidationFailedException
     */
    private function handleResponse()
    {
        if ($this->getBody()->getSize() > 0) {
            $body = (string)$this->getBody();
            $data = $this->jsonDecoder->decode($body);

            if (isset($data->results, $data->totalCount)) {
                $this->total = $data->totalCount;
                $this->data = $data->results;
                
                return;
            }
        }

        $this->data = null;
        $this->total = 0;
    }
}

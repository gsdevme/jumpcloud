<?php

namespace JumpCloud\Response;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Psr7\Response as HttpResponse;

class SystemsResponse implements ResponseInterface
{
    use ResponseTrait;
    
    /**
     * @var ArrayCollection
     */
    private $collection;

    /**
     * SystemsResponse constructor.
     * @param HttpResponse $response
     * @param ArrayCollection $collection
     */
    public function __construct(HttpResponse $response, ArrayCollection $collection)
    {
        $this->response = $response;
        $this->collection = $collection;
    }

    /**
     * @return ArrayCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }
}

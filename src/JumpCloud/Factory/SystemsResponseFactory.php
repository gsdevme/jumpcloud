<?php

namespace JumpCloud\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Psr7\Response;
use JumpCloud\Model\System;
use JumpCloud\Response\SystemsResponse;
use Webmozart\Json\JsonDecoder;

/**
 * Class SystemsResponseFactory
 * @package JumpCloud\Factory
 */
class SystemsResponseFactory implements ResponseFactoryInterface
{
    /**
     * @param Response $response
     * @return SystemsResponse
     */
    public function create(Response $response)
    {
        $jsonDecoder = new JsonDecoder();
        $collection = new ArrayCollection();

        if ($response->getStatusCode() === 200) {
            $data = (string)$response->getBody();

            try {
                $data = $jsonDecoder->decode($data);
            } catch (\Exception $e) {

            }

            if (isset($data->results)) {
                foreach ($data->results as $result) {
                    $collection->add(System::createFromApi($result));
                }
            }
        }

        return new SystemsResponse($response, $collection);
    }
}

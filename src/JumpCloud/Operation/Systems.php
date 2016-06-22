<?php

namespace JumpCloud\Operation;

use JumpCloud\Factory\MultiformatResponseFactory;
use JumpCloud\Fields\NoopFields;
use JumpCloud\Request\Request;
use JumpCloud\Request\RequestInterface;
use JumpCloud\Request\SystemRequestInterface;

/**
 * Class Authenticate
 * @package JumpCloud\Operation
 */
class Systems implements RequestInterface, SystemRequestInterface
{
    use RequestOperationTrait;
    use FieldsOperationTrait {
        FieldsOperationTrait::getBody insteadof RequestOperationTrait;
    }

    /**
     * Systems constructor.
     */
    public function __construct()
    {
        $request = new Request();
        $request->setUri(SystemRequestInterface::ENDPOINT);
        $request->setMethod('POST');
        $request->setResponseFactory(new MultiformatResponseFactory());

        $this->fields = new NoopFields();

        $this->request = $request;
    }
}

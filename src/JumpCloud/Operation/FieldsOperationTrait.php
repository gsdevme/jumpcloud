<?php

namespace JumpCloud\Operation;

use JumpCloud\Fields\FieldsInterface;
use JumpCloud\Request\RequestInterface;

/**
 * Class FieldOperationTrait
 * @package JumpCloud\Operation
 */
trait FieldsOperationTrait
{
    /**
     * @var FieldsInterface
     */
    private $fields;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @return array
     */
    public function getBody()
    {
        $body = $this->request->getBody();

        if ($this->fields !== null) {
            $fields = $this->fields->getFields();

            if (is_array($fields)) {
                $fields = implode(' ', $fields);
            }

            $body[FieldsInterface::NAME] = $fields;
        }

        return $body;
    }

    /**
     * @param FieldsInterface $fields
     */
    public function setFields(FieldsInterface $fields)
    {
        $this->fields = $fields;
    }
}

<?php

namespace JumpCloud\Fields;

class NoopFields implements FieldsInterface
{
    /**
     * @inheritdoc
     */
    public function getFields()
    {
        return null;
    }
}

<?php

namespace JumpCloud\Fields;

interface FieldsInterface
{
    const NAME = 'fields';
    
    /**
     * @return string|array
     */
    public function getFields();
}

<?php

namespace JumpCloud\Fields;

class SimpleSystemFields implements FieldsInterface
{
    /**
     * @inheritdoc
     */
    public function getFields()
    {
        return [
            'created',
            'tags',
            'hostname',
            'displayName',
            'remoteIP',
            'active',
            'allowSshPasswordAuthentication',
            'allowSshRootLogin',
            'allowMultiFactorAuthentication',
            'allowPublicKeyAuthentication',
        ];
    }
}

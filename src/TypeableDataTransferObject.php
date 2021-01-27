<?php

namespace BigPictureMedical\OpenEhr;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\ValueCaster;

abstract class TypeableDataTransferObject extends DataTransferObject
{
    protected function getValueCaster(): ValueCaster
    {
        return new TypeableValueCaster();
    }

    public function toArray(): array
    {
        return Helpers::recursivelyRemoveNulls(parent::toArray());
    }
}

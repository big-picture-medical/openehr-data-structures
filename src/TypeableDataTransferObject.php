<?php

namespace BigPictureMedical\OpenEhr;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

#[CastWith(TypeableDataTransferObjectCaster::class)]
abstract class TypeableDataTransferObject extends DataTransferObject
{
    public function toArray(): array
    {
        return Helpers::recursivelyRemoveNulls(parent::toArray());
    }
}

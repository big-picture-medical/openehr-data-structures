<?php

namespace BigPictureMedical\OpenEhr;

use RuntimeException;
use Spatie\DataTransferObject\Caster;

class TypeableArrayCaster implements Caster
{
    public function __construct(
        private $type,
        private string $itemType,
    ) {
    }

    public function cast(mixed $value): mixed
    {
        if ($this->type !== 'array') {
            throw new RuntimeException('Can only cast arrays');
        }

        $caster = new TypeableDataTransferObjectCaster($this->itemType);

        return array_map(
            fn (array $item) => $caster->cast($item),
            $value
        );
    }
}

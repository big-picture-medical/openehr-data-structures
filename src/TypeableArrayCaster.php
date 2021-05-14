<?php

namespace BigPictureMedical\OpenEhr;

use RuntimeException;
use Spatie\DataTransferObject\Caster;
use TypeError;

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

        return array_map(fn ($item) => $this->validate($caster->cast($item)), $value);
    }

    protected function validate(mixed $value): mixed
    {
        if (! $value instanceof $this->itemType) {
            throw new TypeError("Expected instance of $this->itemType, got " . get_class($value));
        }

        return $value;
    }
}

<?php

namespace BigPictureMedical\OpenEhr;

use Spatie\DataTransferObject\ValueCaster;
use Throwable;

class TypeableValueCaster extends ValueCaster
{
    public static $typeMap;

    public function castValue($value, array $allowedTypes)
    {
        /*
         * The _type isn't mandatory - we just defer to the parents logic when
         * it's not provided.
         */
        if (empty($value['_type'])) {
            return parent::castValue($value, $allowedTypes);
        }

        /*
         * For openEHR, the _type parameter needs to be a specific string, so
         * we need a type map to know which concrete PHP class to use for each.
         */
        if (isset(static::$typeMap[$value['_type']])) {
            return new static::$typeMap[$value['_type']]($value);
        }

        /*
         * We can also support implementations that use a fully-qualified class
         * name as the _type.
         */
        if (class_exists($value['_type'])) {
            return new $value['_type']($value);
        }

        /**
         * If all else fails, let the parent class have a crack at it.
         * We'll return a more descriptive error calling out the _type that was attempted
         */
        try {
            return parent::castValue($value, $allowedTypes);
        } catch (Throwable $e) {
            throw new \RuntimeException("Unable to cast type [{$value['_type']}] to [" . implode(', ', $allowedTypes) . ']. Do you need to register a type map? Original error was: ' . $e->getMessage());
        }
    }

    public function castCollection($values, array $allowedArrayTypes)
    {
        /*
         * The parent method attempts to new up the DTO class directly, which
         * fails for our abstract classes that rely on the _type to determine
         * the concrete class. It's easiest to just let our castValue() logic
         * handle it.
         */

        $casts = [];

        foreach ($values as $value) {
            $this->castValue($value, $allowedArrayTypes);
        }

        return $casts;
    }
}

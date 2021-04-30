<?php

namespace BigPictureMedical\OpenEhr;

use Spatie\DataTransferObject\Casters\DataTransferObjectCaster;
use Spatie\DataTransferObject\DataTransferObject;
use Throwable;

class TypeableDataTransferObjectCaster extends DataTransferObjectCaster
{
    public static $typeMap;

    public function cast(mixed $value): DataTransferObject
    {
        /*
         * The _type isn't mandatory - we just defer to the parents logic when
         * it's not provided.
         */
        if (empty($value['_type'])) {
            return parent::cast($value);
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
            return parent::cast($value);
        } catch (Throwable $e) {
            throw new \RuntimeException("Unable to cast type [{$value['_type']}]. Do you need to register a type map? Original error was: " . $e->getMessage());
        }
    }

    public static function map(string $type, string $class): void
    {
        static::$typeMap[$type] = $class;
    }

    public static function register(string $class): void
    {
        $reflection = new \ReflectionClass($class);

        self::map($reflection->getProperty('_type')->getDefaultValue(), $class);
    }
}

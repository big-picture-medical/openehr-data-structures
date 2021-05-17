<?php

namespace BigPictureMedical\OpenEhr\Validators;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class ValidObjectVersionId implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if (! is_string($value)) {
            return ValidationResult::invalid('Value must be a string.');
        }

        if (preg_match('/^.*::.*::[0-9.]*$/', $value) !== 1) {
            return ValidationResult::invalid('Value is not valid lexical form: object_id \'::\' creating_system_id \'::\' version_tree_id');
        }

        return ValidationResult::valid();
    }
}

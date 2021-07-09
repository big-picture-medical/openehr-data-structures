<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

class TerminologyId extends ObjectId
{
    public string $_type = 'TERMINOLOGY_ID';

    public static function make(string $value): self
    {
        return new self(value: $value);
    }
}

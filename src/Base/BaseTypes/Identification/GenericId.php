<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

class GenericId extends ObjectId
{
    public string $_type = 'GENERIC_ID';

    public string $scheme;
}

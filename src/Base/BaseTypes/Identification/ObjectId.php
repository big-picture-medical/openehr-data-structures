<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

abstract class ObjectId extends Any
{
    public string $_type = 'OBJECT_ID';

    public string $value; 
}

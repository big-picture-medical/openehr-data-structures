<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

abstract class Uid extends Any
{
    public string $_type = 'UID';

    public string $value;
}

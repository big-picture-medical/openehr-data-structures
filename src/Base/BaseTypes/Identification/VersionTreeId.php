<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

class VersionTreeId extends Any
{
    public string $_type = 'VERSION_TREE_ID';

    public string $value;
}

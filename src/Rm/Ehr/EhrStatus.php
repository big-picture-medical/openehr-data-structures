<?php

namespace BigPictureMedical\OpenEhr\Rm\Ehr;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartySelf;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;

class EhrStatus extends Locatable
{
    public string $_type = 'EHR_STATUS';

    public PartySelf $subject;

    public bool $is_queryable;

    public bool $is_modifiable;

    public ?ItemStructure $other_details;
}

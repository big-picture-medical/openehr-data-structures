<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;

class CareEntry extends Entry
{
    public string $_type = 'CARE_ENTRY';

    public ?ItemStructure $protocol;

    public ?ObjectRef $guideline_id;
}

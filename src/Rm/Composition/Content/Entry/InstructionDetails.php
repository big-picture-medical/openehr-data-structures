<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\LocatableRef;
use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;

class InstructionDetails extends Pathable
{
    public string $_type = 'INSTRUCTION_DETAILS';

    public LocatableRef $instruction_id;

    public string $activity_id;

    public ?ItemStructure $wf_details;
}

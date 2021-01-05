<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;

class Action extends CareEntry
{
    public string $_type = 'ACTION';

    public DvDateTime $time;

    public IsmTransition $ism_transition;

    public ?InstructionDetails $instrument_details;

    public ItemStructure $description;
}

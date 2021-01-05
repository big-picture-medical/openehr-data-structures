<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\History;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;

abstract class Event extends Locatable
{
    public string $_type = 'EVENT';

    public DvDateTime $time;

    public ?ItemStructure $state;

    public ItemStructure $data;
}

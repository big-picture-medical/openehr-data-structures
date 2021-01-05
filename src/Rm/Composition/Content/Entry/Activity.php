<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvParsable;

class Activity extends Locatable
{
    public string $_type = 'ACTIVITY';

    public ?DvParsable $timing;

    public string $action_archetype_id;

    public ItemStructure $description;
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\DataStructures\History\History;

class Observation extends CareEntry
{
    public string $_type = 'OBSERVATION';

    public History $data;

    public ?History $state;
}

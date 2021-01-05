<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;

class Evaluation extends CareEntry
{
    public string $_type = 'EVALUATION';

    public ItemStructure $data;
}

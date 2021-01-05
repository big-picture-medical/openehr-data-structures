<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;

class AdminEntry extends Entry
{
    public string $_type = 'ADMIN_ENTRY';

    public ItemStructure $data;
}

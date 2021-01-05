<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element;

class ItemSingle extends ItemStructure
{
    public string $_type = 'ITEM_SINGLE';

    public Element $item;
}

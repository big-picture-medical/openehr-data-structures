<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

class ItemTree extends ItemStructure
{
    public string $_type = 'ITEM_TREE';

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item[] */
    public $items;
}

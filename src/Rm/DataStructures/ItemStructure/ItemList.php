<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

class ItemList extends ItemStructure
{
    public string $_type = 'ITEM_LIST';

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element[] */
    public array $items;
}

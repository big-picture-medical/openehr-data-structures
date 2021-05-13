<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class ItemList extends ItemStructure
{
    public string $_type = 'ITEM_LIST';

    /** @var Element[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Element::class)]
    public array $items;
}

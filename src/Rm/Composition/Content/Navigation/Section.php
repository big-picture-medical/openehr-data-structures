<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Navigation;

use BigPictureMedical\OpenEhr\Rm\Composition\Content\ContentItem;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class Section extends ContentItem
{
    /** @var ContentItem[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ContentItem::class)]
    public array $items;
}

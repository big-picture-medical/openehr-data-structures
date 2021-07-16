<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyProxy;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\ContentItem;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * @template TUidType
 * @extends Locatable<TUidType>
 */
class Composition extends Locatable
{
    public string $_type = 'COMPOSITION';

    public CodePhrase $language;

    public CodePhrase $territory;

    public DvCodedText $category;

    public ?EventContext $context;

    public PartyProxy $composer;

    /** @var ContentItem[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ContentItem::class)]
    public array $content;

    public function firstEntry(string $archetypeNodeId): ContentItem
    {
        return collect($this->content)->firstWhere('archetype_node_id', $archetypeNodeId);
    }

    public function entries(string $archetypeNodeId): Collection
    {
        return collect($this->content)->where('archetype_node_id', $archetypeNodeId)->values();
    }
}

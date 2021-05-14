<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

class ItemTree extends ItemStructure
{
    public string $_type = 'ITEM_TREE';

    /** @var Item[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Item::class)]
    public array $items;

    public function find(string $archetypeNodeId): ?Item
    {
        return collect($this->items)->firstWhere('archetype_node_id', $archetypeNodeId);
    }

    public function findMany(string $archetypeNodeId): Collection
    {
        return collect($this->items)->where('archetype_node_id', $archetypeNodeId)->values();
    }
}

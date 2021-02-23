<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure;

use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item;
use Illuminate\Support\Collection;

class ItemTree extends ItemStructure
{
    public string $_type = 'ITEM_TREE';

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item[] */
    public $items;

    public function find(string $archetypeNodeId): ?Item
    {
        return collect($this->items)->firstWhere('archetype_node_id', $archetypeNodeId);
    }

    public function findMany(string $archetypeNodeId): Collection
    {
        return collect($this->items)->where('archetype_node_id', $archetypeNodeId)->values();
    }
}

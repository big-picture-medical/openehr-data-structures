<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\Representation;

use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

class Cluster extends Item
{
    public string $_type = 'CLUSTER';

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

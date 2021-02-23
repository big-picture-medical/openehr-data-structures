<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\Representation;

use Illuminate\Support\Collection;

class Cluster extends Item
{
    public string $_type = 'CLUSTER';

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item[] */
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

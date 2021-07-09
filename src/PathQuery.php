<?php

namespace BigPictureMedical\OpenEhr;

use Illuminate\Support\Collection;

class PathQuery
{
    public function __construct(protected $query) {}

    public function find(object $root)
    {
        $item = $root;

        foreach ($this->segments() as $segment) {
            if (! isset($segment['expression'])) {
                $item = $item?->{$segment['attribute_name']};
                continue;
            }

            $item = collect($item?->{$segment['attribute_name']})->firstWhere('archetype_node_id', $segment['expression']);
        }

        return $item;
    }

    public function findList(object $root)
    {
        $items = collect([$root]);

        foreach ($this->segments() as $segment) {
            $items = $items
                ->map(fn ($item) => $item->{$segment['attribute_name']})->flatten()
                ->when(
                    isset($segment['expression']),
                    fn ($items) => $items->filter(fn ($item) => $item->archetype_node_id === $segment['expression'])
                );
        }

        return $items->toArray();
    }

    private function segments(): Collection
    {
        return collect(explode('/', $this->query))->map(function ($segment) {
            $attributePattern = '(?<attribute_name>\w+)';
            $predicatePattern = '(?<predicate>\[(?<expression>[\w.-]+)\])?';
            if (preg_match('/^' . $attributePattern . $predicatePattern . '$/', $segment, $matches) !== 1) {
                throw new \Exception("Unable to parse path segment [$segment]");
            }

            if (! array_key_exists('attribute_name', $matches)) {
                throw new \Exception("Unable to find attribute_name in path segment [$segment]");
            }

            return $matches;
        });
    }
}

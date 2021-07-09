<?php

namespace BigPictureMedical\OpenEhr;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use Illuminate\Support\Collection;

class PathQuery
{
    public function __construct(protected string $query) {}

    public function find(Pathable $root): mixed
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

    public function findList(Pathable $root): array
    {
        $items = collect([$root]);

        foreach ($this->segments() as $segment) {
            $items = $items
                ->map(fn ($item) => $item->{$segment['attribute_name']})
                ->flatten()
                ->when(
                    isset($segment['expression']),
                    fn ($items) => $items
                        ->filter(fn ($item) => $item->archetype_node_id === $segment['expression'])
                        ->values()
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

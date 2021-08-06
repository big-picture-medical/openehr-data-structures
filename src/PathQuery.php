<?php

namespace BigPictureMedical\OpenEhr;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use Illuminate\Support\Collection;
use RuntimeException;

class PathQuery
{
    public function __construct(protected string $query) {}

    public function find(Pathable $root): mixed
    {
        $items = $this->findList($root);

        if (count($items) > 1) {
            throw new RuntimeException('Found multiple items at path. Found '.count($items).', expected 1.');
        }

        return $items[0] ?? null;
    }

    public function findList(Pathable $root): array
    {
        $items = collect([$root]);

        foreach ($this->segments() as $segment) {
            $items = $items
                ->map(fn ($item) => $item->{$segment['attribute_name']} ?? null)
                ->flatten()
                ->when(
                    isset($segment['expression']),
                    fn ($items) => $items
                        ->filter(fn ($item) => ($item?->archetype_node_id ?? null) === $segment['expression'])
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
                throw new RuntimeException("Unable to parse path segment [$segment]");
            }

            if (! array_key_exists('attribute_name', $matches)) {
                throw new RuntimeException("Unable to find attribute_name in path segment [$segment]");
            }

            return $matches;
        });
    }
}

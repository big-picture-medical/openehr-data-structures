<?php

namespace BigPictureMedical\OpenEhr;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use Illuminate\Support\Collection;

class PathQuery
{
    public function __construct(protected string $query) {}

    public function find(Pathable $root): mixed
    {
        return $this->findList($root)[0] ?? null;
    }

    public function findList(Pathable $root): array
    {
        $items = collect([$root]);

        foreach ($this->segments() as $segment) {
            $items = $items
                ->map(fn ($item) => $item->{$segment['attribute_name']} ?? null)
                ->filter()
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

    public function exists(Pathable $root): bool
    {
        return count($this->findList($root)) > 0;
    }

    public function unique(Pathable $root): bool
    {
        return count($this->findList($root)) === 1;
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

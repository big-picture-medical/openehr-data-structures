<?php

namespace BigPictureMedical\OpenEhr;

class Helpers
{
    public static function recursivelyRemoveNulls(array $items): array
    {
        $items = array_map(function ($item) {
            return is_array($item) ? Helpers::recursivelyRemoveNulls($item) : $item;
        }, $items);

        return array_filter($items, function ($item): bool {
            return $item !== null;
        });
    }
}

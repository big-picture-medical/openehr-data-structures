<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\PathQuery;

abstract class Pathable extends Any
{
    public string $_type = 'PATHABLE';

    public function itemAtPath(string $path): mixed
    {
        return (new PathQuery($path))->find($this);
    }

    public function itemsAtPath(string $path): array
    {
        return (new PathQuery($path))->findList($this);
    }

    public function pathExists(string $path): bool
    {
        return (new PathQuery($path))->exists($this);
    }

    public function pathUnique(string $path): bool
    {
        return (new PathQuery($path))->unique($this);
    }
}

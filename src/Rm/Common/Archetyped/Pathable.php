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
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\Representation;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;

abstract class Item extends Locatable
{
    public string $_type = 'ITEM';
}

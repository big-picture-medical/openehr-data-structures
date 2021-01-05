<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;

abstract class ContentItem extends Locatable
{
    public string $_type = 'CONTENT_ITEM';
}

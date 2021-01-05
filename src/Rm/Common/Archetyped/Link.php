<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Uri\DvEhrUri;

class Link extends Any
{
    public string $_type = 'LINK';

    public DvText $meaning;

    public DvText $type;

    public DvEhrUri $target;
}

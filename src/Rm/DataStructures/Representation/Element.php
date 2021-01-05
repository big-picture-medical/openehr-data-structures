<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\Representation;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

class Element extends Item
{
    public string $_type = 'ELEMENT';

    public ?DvCodedText $null_flavour;

    public ?DataValue $value;

    public ?DvText $null_reason;
}

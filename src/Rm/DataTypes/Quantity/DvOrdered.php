<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;

abstract class DvOrdered extends DataValue
{
    public string $_type = 'DV_ORDERED';

    public ?CodePhrase $normal_status;

    public ?DvInterval $normal_range;
}

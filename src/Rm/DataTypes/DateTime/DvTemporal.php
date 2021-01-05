<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvAbsoluteQuantity;

class DvTemporal extends DvAbsoluteQuantity
{
    public string $_type = 'DV_TEMPORAL';

    public ?DvDuration $accuracy;
}

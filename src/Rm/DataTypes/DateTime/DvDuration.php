<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvAmount;

class DvDuration extends DvAmount
{
    public string $_type = 'DV_DURATION';

    public string $value;
}

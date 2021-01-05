<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;

class DvScale extends DvOrdered
{
    public string $_type = 'DV_SCALE';

    public DvCodedText $symbol;

    public float $value;
}

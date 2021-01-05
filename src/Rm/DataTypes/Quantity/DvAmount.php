<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvAmount extends DvQuantified
{
    public string $_type = 'DV_AMOUNT';

    public ?bool $accuracy_is_percent;

    public ?float $accuracy;
}

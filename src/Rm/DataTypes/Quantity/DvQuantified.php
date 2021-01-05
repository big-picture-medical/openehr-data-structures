<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvQuantified extends DvOrdered
{
    public string $_type = 'DV_QUANTIFIED';

    public ?string $magnitude_status;
}

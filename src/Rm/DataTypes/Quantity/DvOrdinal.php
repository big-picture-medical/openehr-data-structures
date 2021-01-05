<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;

class DvOrdinal extends DvOrdered
{
    public string $_type = 'DV_ORDINAL';

    public DvCodedText $symbol;

    public int $value;
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Uri;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;

class DvUri extends DataValue
{
    public string $_type = 'DV_URI';

    public string $value;
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Basic;

class DvBoolean extends DataValue
{
    public string $_type = 'DV_BOOLEAN';

    public bool $value;
}

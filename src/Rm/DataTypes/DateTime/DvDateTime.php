<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime;

class DvDateTime extends DvTemporal
{
    public string $_type = 'DV_DATE_TIME';

    public string $value;
}

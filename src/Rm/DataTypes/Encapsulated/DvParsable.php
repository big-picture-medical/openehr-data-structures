<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated;

class DvParsable extends DvEncapsulated
{
    public string $_type = 'DV_PARSABLE';

    public string $value;

    public string $formalism;
}

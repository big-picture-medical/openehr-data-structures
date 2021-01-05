<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;

class DvEncapsulated extends DataValue
{
    public string $_type = 'DV_ENCAPSULATED';

    public ?CodePhrase $charset;

    public ?CodePhrase $language;
}

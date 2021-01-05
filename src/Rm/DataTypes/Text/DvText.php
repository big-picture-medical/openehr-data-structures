<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;

class DvText extends DataValue
{
    public string $_type = 'DV_TEXT';

    public string $value;

    public ?string $formatting;

    /** @var ?TermMapping[] */
    public $mappings;

    public ?CodePhrase $language;
}

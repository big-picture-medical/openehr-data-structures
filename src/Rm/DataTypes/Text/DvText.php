<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class DvText extends DataValue
{
    public string $_type = 'DV_TEXT';

    public string $value;

    public ?string $formatting;

    /** @var ?TermMapping[] */
    #[CastWith(TypeableArrayCaster::class, itemType: TermMapping::class)]
    public ?array $mappings;

    public ?CodePhrase $language;
}

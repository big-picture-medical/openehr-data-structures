<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DvIdentifier;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class PartyIdentified extends PartyProxy
{
    public string $_type = 'PARTY_IDENTIFIED';

    public ?string $name;

    /** @var ?DvIdentifier[] */
    #[CastWith(TypeableArrayCaster::class, itemType: DvIdentifier::class)]
    public ?array $identifiers;
}

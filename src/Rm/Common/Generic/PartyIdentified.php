<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

class PartyIdentified extends PartyProxy
{
    public string $_type = 'PARTY_IDENTIFIED';

    public ?string $name;

    /** @var ?\BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DvIdentifier[] */
    public $identifiers;
}

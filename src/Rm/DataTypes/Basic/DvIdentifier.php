<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Basic;

class DvIdentifier extends DataValue
{
    public string $_type = 'DV_IDENTIFIER';

    public ?string $issuer;

    public ?string $assigner;

    public string $id;

    public ?string $type;
}

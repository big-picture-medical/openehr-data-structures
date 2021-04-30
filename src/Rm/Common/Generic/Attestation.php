<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvMultimedia;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Uri\DvEhrUri;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class Attestation extends AuditDetails
{
    public string $_type = 'ATTESTATION';

    public ?DvMultimedia $attested_view;

    public ?string $proof;

    /**
     * @var ?DvEhrUri[]
     */
    #[CastWith(TypeableArrayCaster::class, itemType: DvEhrUri::class)]
    public ?array $items;

    public DvText $reason;

    public bool $is_pending;
}

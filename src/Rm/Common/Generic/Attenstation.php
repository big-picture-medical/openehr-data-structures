<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvMultimedia;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Uri\DvEhrUri;

class Attenstation extends AuditDetails
{
    public ?DvMultimedia $attested_view;

    public ?string $proof;

    /**
     * @var ?DvEhrUri[]
     */
    public ?array $items;

    public DvText $reason;

    public bool $is_pending;
}

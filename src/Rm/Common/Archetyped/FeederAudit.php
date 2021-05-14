<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DvIdentifier;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvEncapsulated;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class FeederAudit extends Any
{
    public string $_type = 'FEEDER_AUDIT';

    /** DvIdentifier[] */
    #[CastWith(TypeableArrayCaster::class, itemType: DvIdentifier::class)]
    public array $originating_system_item_ids;

    /** DvIdentifier[] */
    #[CastWith(TypeableArrayCaster::class, itemType: DvIdentifier::class)]
    public array $feeder_system_item_ids;

    public ?DvEncapsulated $original_content;

    public FeederAuditDetails $originating_system_audit;

    public ?FeederAuditDetails $feeder_system_audit;
}

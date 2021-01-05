<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvEncapsulated;

class FeederAudit extends Any
{
    public string $_type = 'FEEDER_AUDIT';

    /** DvIdentifier[] */
    public $originating_system_item_ids;

    /** DvIdentifier[] */
    public $feeder_system_item_ids;

    public ?DvEncapsulated $original_content;

    public FeederAuditDetails $originating_system_audit;

    public ?FeederAuditDetails $feeder_system_audit;
}

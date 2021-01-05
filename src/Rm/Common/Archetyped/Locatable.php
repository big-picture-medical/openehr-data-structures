<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\UidBasedId;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

abstract class Locatable extends Pathable
{
    public string $_type = 'LOCATABLE';

    public DvText $name;

    public string $archetype_node_id;

    public ?UidBasedId $uid;

    /** ?Link[] */
    public $links;

    public ?Archetyped $archetype_details;

    public ?FeederAudit $feeder_audit;
}

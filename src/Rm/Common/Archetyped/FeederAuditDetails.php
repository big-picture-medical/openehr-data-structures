<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyIdentified;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyProxy;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;

class FeederAuditDetails extends Any
{
    public string $_type = 'FEEDER_AUDIT_DETAILS';

    public string $system_id;

    public ?PartyIdentified $location;

    public ?PartyProxy $subject;

    public ?PartyIdentified $provider;

    public ?DvDateTime $time;

    public ?string $version_id;

    public ?ItemStructure $other_details;
}

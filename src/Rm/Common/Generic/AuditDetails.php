<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

class AuditDetails extends Any
{
    public string $_type = 'AUDIT_DETAILS';

    public string $system_id;

    public DvDateTime $time_committed;

    public DvCodedText $change_type;

    public ?DvText $description;

    public PartyProxy $committer;
}

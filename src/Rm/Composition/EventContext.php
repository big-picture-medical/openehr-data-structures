<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition;

use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\Participation;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyIdentified;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;

class EventContext extends Pathable
{
    public string $_type = 'EVENT_CONTEXT';

    public DvDateTime $start_time;

    public ?DvDateTime $end_time;

    public ?string $location;

    public ?DvCodedText $setting;

    public ?ItemStructure $other_context;

    public ?PartyIdentified $health_care_facility;

    /** @var Participation[] */
    public $participations;
}

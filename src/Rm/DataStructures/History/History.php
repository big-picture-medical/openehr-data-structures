<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\History;

use BigPictureMedical\OpenEhr\Rm\DataStructures\DataStructure;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDuration;

class History extends DataStructure
{
    public string $_type = 'HISTORY';

    public DvDateTime $origin;

    public ?DvDuration $period;

    public ?DvDuration $duration;

    public ?ItemStructure $summary;

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\History\Event[] */
    public array $events;
}

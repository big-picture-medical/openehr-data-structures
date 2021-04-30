<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\History;

use BigPictureMedical\OpenEhr\Rm\DataStructures\DataStructure;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemStructure;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDuration;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class History extends DataStructure
{
    public string $_type = 'HISTORY';

    public DvDateTime $origin;

    public ?DvDuration $period;

    public ?DvDuration $duration;

    public ?ItemStructure $summary;

    /** @var Event[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Event::class)]
    public array $events;
}

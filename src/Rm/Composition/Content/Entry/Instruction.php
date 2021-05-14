<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated\DvParsable;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class Instruction extends CareEntry
{
    public string $_type = 'INSTRUCTION';

    public DvText $narrative;

    public ?DvDateTime $expiry;

    public DvParsable $wf_definition;

    /** @var Activity[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Activity::class)]
    public array $activities;
}

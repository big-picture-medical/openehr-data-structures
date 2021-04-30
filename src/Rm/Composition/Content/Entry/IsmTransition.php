<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class IsmTransition extends Pathable
{
    public string $_type = 'ISM_TRANSITION';

    public DvCodedText $current_state;

    public DvCodedText $transition;

    public ?DvCodedText $careflow_step;

    /** @var DvText[] */
    #[CastWith(TypeableArrayCaster::class, itemType: DvText::class)]
    public array $reason;
}

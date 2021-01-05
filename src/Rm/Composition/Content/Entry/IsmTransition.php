<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Pathable;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

class IsmTransition extends Pathable
{
    public string $_type = 'ISM_TRANSITION';

    public DvCodedText $current_state;

    public DvCodedText $transition;

    public ?DvCodedText $careflow_step;

    /** @var DvText[] */
    public array $reason;
}

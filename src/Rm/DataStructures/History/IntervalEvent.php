<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\History;

use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDuration;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;

class IntervalEvent extends Event
{
    public string $_type = 'INTERVAL_EVENT';

    public DvDuration $width;

    public ?int $sample_count;

    public DvCodedText $math_function;
}

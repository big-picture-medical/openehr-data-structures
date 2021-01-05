<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvInterval;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

class Participation
{
    public string $_type = 'PARTICIPATION';

    public DvText $function;

    public ?DvCodedText $mode;

    public PartyProxy $performer;

    /** @var ?DvInterval<DvDateTime> */
    public ?DvInterval $time;
}

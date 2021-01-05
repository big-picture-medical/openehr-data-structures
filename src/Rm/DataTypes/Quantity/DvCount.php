<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvCount extends DvAmount
{
    public string $_type = 'DV_COUNT';

    public int $magnitude;

    /** @var ?DvInterval<self> */
    public ?DvInterval $normal_range;

    /** @var ?ReferenceRange<self> */
    public ?ReferenceRange $other_reference_ranges;
}

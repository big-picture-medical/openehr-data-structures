<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvProportion extends DvAmount
{
    public string $_type = 'DV_PROPORTION';

    public float $numerator;

    public float $denominator;

    public int $type;

    public ?int $precision;

    /** @var ?DvInterval<self> */
    public ?DvInterval $normal_range;

    /** @var ?ReferenceRange<self> */
    public ?ReferenceRange $other_reference_ranges;
}

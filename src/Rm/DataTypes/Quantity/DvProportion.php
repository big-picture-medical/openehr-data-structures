<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvProportion extends DvAmount
{
    public const PK_RATIO = 0;

    public const PK_UNITARY = 1;

    public const PK_PERCENT = 2;

    public const PK_FRACTION = 3;

    public const PK_INTEGER_FRACTION = 4;

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

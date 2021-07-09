<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvProportion extends DvAmount
{
    public const PK_RATIO = ProportionKind::PK_RATIO;

    public const PK_UNITARY = ProportionKind::PK_UNITARY;

    public const PK_PERCENT = ProportionKind::PK_PERCENT;

    public const PK_FRACTION = ProportionKind::PK_FRACTION;

    public const PK_INTEGER_FRACTION = ProportionKind::PK_INTEGER_FRACTION;

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

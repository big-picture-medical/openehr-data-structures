<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

class DvQuantity extends DvAmount
{
    public string $_type = 'DV_QUANTITY';

    public float $magnitude;

    public ?int $precision;

    public string $units;

    public ?string $units_system;

    public ?string $units_display_name;

    /** @var ?DvInterval<self> */
    public ?DvInterval $normal_range;

    /** @var ?ReferenceRange<self> */
    public ?ReferenceRange $other_reference_ranges;
}

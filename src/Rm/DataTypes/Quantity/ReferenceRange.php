<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;

/**
 * @template T
 */
class ReferenceRange
{
    public string $_type = 'REFERENCE_RANGE';

    public DvText $meaning;

    public DvInterval $range;
}

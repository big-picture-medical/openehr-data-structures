<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DataValue;

/**
 * @template T
 */
class DvInterval extends DataValue
{
    public string $_type = 'DV_INTERVAL';

    /** @var ?T */
    public $lower;

    /** @var ?T */
    public $upper;

    public bool $lower_unbounded;

    public bool $upper_unbounded;

    public bool $lower_included;

    public bool $upper_included;
}

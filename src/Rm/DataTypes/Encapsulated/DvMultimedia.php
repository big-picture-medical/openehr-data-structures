<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Encapsulated;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Uri\DvUri;

class DvMultimedia extends DvEncapsulated
{
    public string $_type = 'DV_MULTIMEDIA';

    public ?string $alternate_text;

    public ?DvUri $uri;

    /**
     * A list of bytes.
     *
     * @var string[]
     */
    public ?array $data;

    public CodePhrase $media_type;

    public ?CodePhrase $compression_algorithm;

    /**
     * A list of bytes.
     *
     * @var string[]
     */
    public ?array $integrity_check;

    public ?CodePhrase $integrity_check_algorithm;

    public ?DvMultimedia $thumbnail;

    public int $size;
}

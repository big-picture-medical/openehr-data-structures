<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

class TermMapping
{
    public string $_type = 'TERM_MAPPING';

    public string $match;

    public ?DvCodedText $purpose;

    public CodePhrase $target;
}

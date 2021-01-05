<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

class DvCodedText extends DvText
{
    public string $_type = 'DV_CODED_TEXT';

    public CodePhrase $defining_code;
}

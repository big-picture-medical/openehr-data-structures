<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\TerminologyId;

class DvCodedText extends DvText
{
    public string $_type = 'DV_CODED_TEXT';

    public CodePhrase $defining_code;

    public static function make(string $value, string $codeString, string $terminologyId): self
    {
        return new self([
            'value' => $value,
            'defining_code' => new CodePhrase([
                'code_string' => $codeString,
                'terminology_id' => new TerminologyId([
                    'value' => $terminologyId,
                ]),
            ]),
        ]);
    }
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Text;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\TerminologyId;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

class CodePhrase extends Any
{
    public string $_type = 'CODE_PHRASE';

    public TerminologyId $terminology_id;

    public string $code_string;

    public ?string $preferred_term;
}

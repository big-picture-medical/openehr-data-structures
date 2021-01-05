<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Generic;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\PartyRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

abstract class PartyProxy extends Any
{
    public string $_type = 'PARTY_PROXY';

    public ?PartyRef $external_ref;
}

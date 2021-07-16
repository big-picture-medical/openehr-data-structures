<?php

namespace BigPictureMedical\OpenEhr\Rm\Ehr;

use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;

class EhrAccess extends Locatable
{
    public string $_type = 'EHR_ACCESS';

    /**
     * The access control setting is currently implementation specific.
     */
    public ?object $settings;
}

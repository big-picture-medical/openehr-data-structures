<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ArchetypeId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\TemplateId;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;

class Archetyped extends Any
{
    public string $_type = 'ARCHETYPED';

    public ArchetypeId $archetype_id;

    public ?TemplateId $template_id;

    public string $rm_version;
}

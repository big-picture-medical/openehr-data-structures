<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition;

use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\Common\Archetyped\Locatable;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyProxy;

class Composition extends Locatable
{
    public string $_type = 'COMPOSITION';

    public CodePhrase $language;

    public CodePhrase $territory;

    public DvCodedText $category;

    public ?EventContext $context;

    public PartyProxy $composer;

    /** @var \BigPictureMedical\OpenEhr\Rm\Composition\Content\ContentItem[] */
    public $content;
}

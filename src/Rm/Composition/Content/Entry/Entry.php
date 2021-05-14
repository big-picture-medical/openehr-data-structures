<?php

namespace BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\Participation;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyProxy;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\ContentItem;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

abstract class Entry extends ContentItem
{
    public string $_type = 'ENTRY';

    public CodePhrase $language;

    public CodePhrase $encoding;

    /** @var ?Participation[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Participation::class)]
    public ?array $other_participations;

    public ?ObjectRef $workflow_id;

    public PartyProxy $subject;

    public PartyProxy $provider;
}

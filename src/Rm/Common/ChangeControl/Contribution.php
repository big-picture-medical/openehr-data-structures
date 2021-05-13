<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\HierObjectId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\AuditDetails;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class Contribution extends Any
{
    public string $_type = 'CONTRIBUTION';

    public HierObjectId $uid;

    /** @var ObjectRef[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectRef::class)]
    public array $versions;

    public AuditDetails $audit;
}

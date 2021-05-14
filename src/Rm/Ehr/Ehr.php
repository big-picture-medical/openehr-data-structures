<?php

namespace BigPictureMedical\OpenEhr\Rm\Ehr;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\HierObjectId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class Ehr extends Any
{
    public string $_type = 'EHR';

    public HierObjectId $system_id;

    public HierObjectId $ehr_id;

    /** @var ?ObjectRef[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectRef::class)]
    public ?array $contributions;

    public ObjectRef $ehr_status;

    public ObjectRef $ehr_access;

    /** @var ObjectRef[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectRef::class)]
    public array $compositions;

    public ObjectRef $directory;

    public DvDateTime $time_created;

    /** @var ObjectRef[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectRef::class)]
    public array $folders;

    /** @var ObjectRef[] */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectRef::class)]
    public array $tags;
}

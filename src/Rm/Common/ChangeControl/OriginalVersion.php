<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectVersionId;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\Attestation;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * @template T
 */
class OriginalVersion extends Version
{
    public string $_type = 'ORIGINAL_VERSION';

    public ObjectVersionId $uid;

    public ?ObjectVersionId $preceding_version_uid;

    /**
     * @var ?ObjectVersionId[]
     */
    #[CastWith(TypeableArrayCaster::class, itemType: ObjectVersionId::class)]
    public ?array $other_input_version_uids;

    public DvCodedText $lifecycle_state;

    /**
     * @var ?Attestation[]
     */
    #[CastWith(TypeableArrayCaster::class, itemType: Attestation::class)]
    public ?array $attestations;

    /**
     * @var ?T
     */
    public $data;
}

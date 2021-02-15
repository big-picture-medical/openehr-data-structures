<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectVersionId;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\Attenstation;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use phpDocumentor\Reflection\DocBlock\Tag;

/**
 * @template T
 */
class OriginalVersion extends Version
{
    public string $_type = 'ORIGINAL_VERSION';

    public ObjectVersionId $uid;

    public ?ObjectVersionId $preceding_version_uid;

    /**
     * @var ?\BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectVersionId[]
     */
    public ?array $other_input_version_uids;

    public DvCodedText $lifecycle_state;

    /**
     * @var ?Attenstation[]
     */
    public ?array $attestations;

    /**
     * @var ?T
     */
    public $data;
}

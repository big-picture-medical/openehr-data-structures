<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\HierObjectId;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\AuditDetails;

class Contribution extends Any
{
    public string $_type = 'CONTRIBUTION';

    public HierObjectId $uid;

    /** @var \BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef[] */
    public array $versions;

    public AuditDetails $audit;
}

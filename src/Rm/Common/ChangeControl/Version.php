<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\AuditDetails;

/**
 * @template T
 */
abstract class Version extends Any
{
    public string $_type = 'VERSION';

    public ObjectRef $contribution;

    public ?string $signature;

    public AuditDetails $commit_audit;
}

<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\ChangeControl;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\HierObjectId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;

/**
 * @template T
 */
class VersionedObject extends Any
{
    public string $_type = 'VERSIONED_OBJECT';

    /* Unique Id */
    public HierObjectId $uid;

    /* E.g. ID of EHR */
    public ObjectRef $owner_id;

    public DvDateTime $time_created;
}

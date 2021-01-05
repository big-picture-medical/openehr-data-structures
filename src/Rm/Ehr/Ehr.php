<?php

namespace BigPictureMedical\OpenEhr\Rm\Ehr;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\HierObjectId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectRef;
use BigPictureMedical\OpenEhr\Base\FoundationTypes\Any;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;

class Ehr extends Any
{
    public string $_type = 'EHR';

    public HierObjectId $system_id;

    public HierObjectId $ehr_id;

    /** @var ?ObjectRef[] */
    public $contributions;

    public ObjectRef $ehr_status;

    public ObjectRef $ehr_access;

    /** @var ObjectRef[] */
    public $compositions;

    public ObjectRef $directory;

    public DvDateTime $time_created;

    /** @var ObjectRef[] */
    public $folders;

    /** @var ObjectRef[] */
    public $tags;
}

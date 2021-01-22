<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

use BigPictureMedical\OpenEhr\TypeableDataTransferObject;

class ObjectRef extends TypeableDataTransferObject
{
    public string $_type = 'OBJECT_REF';

    public string $namespace;

    public string $type;

    public ObjectId $id;
}

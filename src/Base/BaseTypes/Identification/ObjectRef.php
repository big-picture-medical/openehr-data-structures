<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

class ObjectRef
{
    public string $_type = 'OBJECT_REF';

    public string $namespace;

    public string $type;

    public ObjectId $id;
}

<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

class ObjectVersionId extends UidBasedId
{
    public string $_type = 'OBJECT_VERSION_ID';

    public function object_id(): Uid
    {
        return new Uuid([
            'value' => explode('::', $this->value)[0]
        ]);
    }

    public function creating_system_id(): Uid
    {
        return new InternetId([
            'value' => explode('::', $this->value)[1]
        ]);
    }

    public function version_tree_id(): VersionTreeId
    {
        return new VersionTreeId([
            'value' => explode('::', $this->value)[2]
        ]);
    }
}

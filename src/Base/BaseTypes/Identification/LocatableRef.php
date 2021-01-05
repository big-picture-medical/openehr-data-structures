<?php

namespace BigPictureMedical\OpenEhr\Base\BaseTypes\Identification;

class LocatableRef extends ObjectRef
{
    public string $_type = 'LOCATABLE_REF';

    public ?string $path;

    public UidBasedId $id;
}

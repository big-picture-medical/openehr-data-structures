<?php

namespace BigPictureMedical\OpenEhr\Base\FoundationTypes;

use BigPictureMedical\OpenEhr\TypeableDataTransferObject;

abstract class Any extends TypeableDataTransferObject
{
    public string $_type = 'ANY';
}

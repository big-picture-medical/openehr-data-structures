<?php

namespace BigPictureMedical\OpenEhr\Rm\DataTypes\Basic;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Definitions\OpenehrDefinitions;

abstract class DataValue extends OpenehrDefinitions
{
    public string $_type = 'DATA_VALUE';
}

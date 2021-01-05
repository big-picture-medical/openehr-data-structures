<?php

namespace BigPictureMedical\OpenEhr\Rm\DataStructures\Representation;

class Cluster extends Item
{
    public string $_type = 'CLUSTER';

    /** @var \BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item[] */
    public array $items;
}

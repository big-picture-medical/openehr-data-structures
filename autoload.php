<?php

use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyIdentified;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartySelf;
use BigPictureMedical\OpenEhr\Rm\Composition\Composition;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Evaluation;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Observation;
use BigPictureMedical\OpenEhr\Rm\DataStructures\History\PointEvent;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemList;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemTree;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Cluster;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Item;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DvBoolean;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDuration;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvQuantity;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableValueCaster;

require_once 'vendor/autoload.php';

function dd($var)
{
    var_dump($var);
    die();
}

TypeableValueCaster::$typeMap['PARTY_IDENTIFIED'] = PartyIdentified::class;
TypeableValueCaster::$typeMap['OBSERVATION'] = Observation::class;
TypeableValueCaster::$typeMap['POINT_EVENT'] = PointEvent::class;
TypeableValueCaster::$typeMap['ITEM_LIST'] = ItemList::class;
TypeableValueCaster::$typeMap['ITEM_TREE'] = ItemTree::class;
TypeableValueCaster::$typeMap['PARTY_SELF'] = PartySelf::class;
TypeableValueCaster::$typeMap['DV_QUANTITY'] = DvQuantity::class;
TypeableValueCaster::$typeMap['DV_TEXT'] = DvText::class;
TypeableValueCaster::$typeMap['DV_CODED_TEXT'] = DvCodedText::class;
TypeableValueCaster::$typeMap['DV_DATE_TIME'] = DvDateTime::class;
TypeableValueCaster::$typeMap['DV_BOOLEAN'] = DvBoolean::class;
TypeableValueCaster::$typeMap['DV_DURATION'] = DvDuration::class;
TypeableValueCaster::$typeMap['CLUSTER'] = Cluster::class;
TypeableValueCaster::$typeMap['ELEMENT'] = Element::class;

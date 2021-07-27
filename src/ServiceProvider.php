<?php

namespace BigPictureMedical\OpenEhr;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\GenericId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectVersionId;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyIdentified;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartySelf;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Evaluation;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Observation;
use BigPictureMedical\OpenEhr\Rm\DataStructures\History\PointEvent;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemList;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemTree;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Cluster;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Basic\DvBoolean;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDate;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDateTime;
use BigPictureMedical\OpenEhr\Rm\DataTypes\DateTime\DvDuration;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvCount;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvOrdinal;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvProportion;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvQuantity;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvScale;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableDataTransferObjectCaster;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        TypeableDataTransferObjectCaster::map('CLUSTER', Cluster::class);
        TypeableDataTransferObjectCaster::map('DV_BOOLEAN', DvBoolean::class);
        TypeableDataTransferObjectCaster::map('DV_CODED_TEXT', DvCodedText::class);
        TypeableDataTransferObjectCaster::map('DV_COUNT', DvCount::class);
        TypeableDataTransferObjectCaster::map('DV_DATE', DvDate::class);
        TypeableDataTransferObjectCaster::map('DV_DATE_TIME', DvDateTime::class);
        TypeableDataTransferObjectCaster::map('DV_DURATION', DvDuration::class);
        TypeableDataTransferObjectCaster::map('DV_ORDINAL', DvOrdinal::class);
        TypeableDataTransferObjectCaster::map('DV_PROPORTION', DvProportion::class);
        TypeableDataTransferObjectCaster::map('DV_QUANTITY', DvQuantity::class);
        TypeableDataTransferObjectCaster::map('DV_SCALE', DvScale::class);
        TypeableDataTransferObjectCaster::map('DV_TEXT', DvText::class);
        TypeableDataTransferObjectCaster::map('ELEMENT', Element::class);
        TypeableDataTransferObjectCaster::map('EVALUATION', Evaluation::class);
        TypeableDataTransferObjectCaster::map('OBJECT_VERSION_ID', ObjectVersionId::class);
        TypeableDataTransferObjectCaster::map('GENERIC_ID', GenericId::class);
        TypeableDataTransferObjectCaster::map('ITEM_LIST', ItemList::class);
        TypeableDataTransferObjectCaster::map('ITEM_TREE', ItemTree::class);
        TypeableDataTransferObjectCaster::map('OBSERVATION', Observation::class);
        TypeableDataTransferObjectCaster::map('PARTY_IDENTIFIED', PartyIdentified::class);
        TypeableDataTransferObjectCaster::map('PARTY_SELF', PartySelf::class);
        TypeableDataTransferObjectCaster::map('POINT_EVENT', PointEvent::class);
    }
}

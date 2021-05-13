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
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvQuantity;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableValueCaster;
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
        TypeableValueCaster::map('CLUSTER', Cluster::class);
        TypeableValueCaster::map('DV_BOOLEAN', DvBoolean::class);
        TypeableValueCaster::map('DV_CODED_TEXT', DvCodedText::class);
        TypeableValueCaster::map('DV_COUNT', DvCount::class);
        TypeableValueCaster::map('DV_DATE', DvDate::class);
        TypeableValueCaster::map('DV_DATE_TIME', DvDateTime::class);
        TypeableValueCaster::map('DV_DURATION', DvDuration::class);
        TypeableValueCaster::map('DV_QUANTITY', DvQuantity::class);
        TypeableValueCaster::map('DV_TEXT', DvText::class);
        TypeableValueCaster::map('ELEMENT', Element::class);
        TypeableValueCaster::map('EVALUATION', Evaluation::class);
        TypeableValueCaster::map('OBJECT_VERSION_ID', ObjectVersionId::class);
        TypeableValueCaster::map('GENERIC_ID', GenericId::class);
        TypeableValueCaster::map('ITEM_LIST', ItemList::class);
        TypeableValueCaster::map('ITEM_TREE', ItemTree::class);
        TypeableValueCaster::map('OBSERVATION', Observation::class);
        TypeableValueCaster::map('PARTY_IDENTIFIED', PartyIdentified::class);
        TypeableValueCaster::map('PARTY_SELF', PartySelf::class);
        TypeableValueCaster::map('POINT_EVENT', PointEvent::class);
    }
}

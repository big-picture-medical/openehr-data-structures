<?php

namespace BigPictureMedical\OpenEhr\Rm\Common\Archetyped;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\UidBasedId;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * @template TUidType of UidBasedId
 */
abstract class Locatable extends Pathable
{
    public string $_type = 'LOCATABLE';

    public DvText $name;

    public string $archetype_node_id;

    /**
     * @var TUidType
     */
    public ?UidBasedId $uid;

    /** @var ?Link[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Link::class)]
    public ?array $links;

    public ?Archetyped $archetype_details;

    public ?FeederAudit $feeder_audit;
}

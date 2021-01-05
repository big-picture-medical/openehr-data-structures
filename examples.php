<?php

use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartyIdentified;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartySelf;
use BigPictureMedical\OpenEhr\Rm\Composition\Composition;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Observation;
use BigPictureMedical\OpenEhr\Rm\DataStructures\History\PointEvent;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemList;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Quantity\DvQuantity;
use BigPictureMedical\OpenEhr\TypeableValueCaster;

require_once('vendor/autoload.php');

function dd($var) {
    var_dump($var);
    die();
}

TypeableValueCaster::$typeMap['PARTY_IDENTIFIED'] = PartyIdentified::class;
TypeableValueCaster::$typeMap['OBSERVATION'] = Observation::class;
TypeableValueCaster::$typeMap['POINT_EVENT'] = PointEvent::class;
TypeableValueCaster::$typeMap['ITEM_LIST'] = ItemList::class;
TypeableValueCaster::$typeMap['PARTY_SELF'] = PartySelf::class;
TypeableValueCaster::$typeMap['DV_QUANTITY'] = DvQuantity::class;

$composition = new Composition([
    'name' => [
        'value' => 'Blood pressure test result',
    ],
    'archetype_node_id' => 'openEHR-EHR-COMPOSITION.encounter.v1',
    'language' => [
        'terminology_id' => [
            'value' => 'ISO_639-1',
        ],
        'code_string' => 'en',
    ],
    'territory' => [
        'terminology_id' => [
            'value' => 'ISO_3166-1',
        ],
        'code_string' => 'AU',
    ],
    'category' => [
        'value' => 'event',
        'defining_code' => [
            'terminology_id' => [
                'value' => 'openehr',
            ],
            'code_string' => '433',
       ]
    ],
    'composer' => [
        '_type' => 'PARTY_IDENTIFIED',
        'name' => 'Jess Archer',
    ],
    'content' => [
        [
            '_type' => 'OBSERVATION',
            'archetype_node_id' => 'openEHR-EHR-OBSERVATION.blood_pressure.v1',
            'name' => [
                'value' => 'Thingy',
            ],
            'language' => [
                'terminology_id' => [
                    'value' => 'ISO_639-1',
                ],
                'code_string' => 'en',
            ],
            'encoding' => [
                'terminology_id' => [
                    'value' => 'IANA_character-sets',
                ],
                'code_string' => 'UTF-8',
            ],
            'subject' => [
                '_type' => 'PARTY_SELF',
            ],
            'provider' => [
                '_type' => 'PARTY_IDENTIFIED',
                'name' => 'Jess Archer',
            ],
            'data' => [
                'name' => [
                    'value' => 'data',
                ],
                'archetype_node_id' => 'at0001',
                'origin' => [
                    'value' => '2020-12-01T16:34:24',
                ],
                'events' => [
                    [
                        '_type' => 'POINT_EVENT',
                        'name' => [
                            'value' => 'any event',
                        ],
                        'archetype_node_id' => 'at0006',
                        'time' => [
                            'value' => '2020-12-01T16:34:24',
                        ],
                        'data' => [
                            '_type' => 'ITEM_LIST',
                            'name' => [
                                'value' => 'data',
                            ],
                            'archetype_node_id' => 'at0003',
                            'items' => [
                                [
                                    'name' => [
                                        'value' => 'systolic',
                                    ],
                                    'archetype_node_id' => 'at0004',
                                    'value' => [
                                        '_type' => 'DV_QUANTITY',
                                        'magnitude' => (float) 80,
                                        'units' => 'mm[Hg]'
                                    ],
                                ]
                            ],
                        ],
                    ],
                ],
            ],
            'state' => null,
        ],
    ],
]);

$array = $composition->toArray();

// dd(json_encode($array, JSON_PRETTY_PRINT));

$composition2 = new Composition($array);

dd($composition2);

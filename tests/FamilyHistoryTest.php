<?php

namespace Tests;

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
use PHPUnit\Framework\TestCase;

class FamilyHistoryTest extends TestCase
{
    public function test_it_can_rehydrate_instance_from_to_array_output(): void
    {
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

        $payload = [
            // TODO: wrap this up in "Family history" specific instance
            'archetype_node_id' => 'openEHR-EHR-EVALUATION.family_history.v2',
            'name' => [
                'value' => 'Family History',
            ],
            // TODO: have these as defaults
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
                'name' => 'Dr. Jess Archer',
            ],
            'data' => [
                '_type' => 'ITEM_TREE',
                'name' => [
                    'value' => 'data',
                ],
                'archetype_node_id' => 'at0001',
                'items' => [
                    [
                        '_type' => 'CLUSTER',
                        'name' => [
                            'value' => 'Per family member',
                        ],
                        'archetype_node_id' => 'at0003',
                        'items' => [
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Family member name',
                                ],
                                'archetype_node_id' => 'at0004',
                                'value' => [
                                    '_type' => 'DV_TEXT',
                                    'value' => 'Aunt Susan'
                                ],
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Relationship',
                                ],
                                'archetype_node_id' => 'at0016',
                                'value' => [
                                    '_type' => 'DV_CODED_TEXT',
                                    'defining_code' => [
                                        'terminology_id' => [
                                            'value' => 'SNOMED-CT',
                                        ],
                                        'code_string' => '736454006',
                                    ],
                                    'value' => 'Maternal Aunt'
                                ],
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Relationship degree',
                                ],
                                'archetype_node_id' => 'at0064',
                                'value' => [
                                    '_type' => 'DV_CODED_TEXT',
                                    'defining_code' => [
                                        'terminology_id' => [
                                            'value' => 'local',
                                        ],
                                        'code_string' => 'at0066',
                                    ],
                                    'value' => 'Second degree relative'
                                ],
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Family line',
                                ],
                                'archetype_node_id' => 'at0068',
                                'value' => [
                                    '_type' => 'DV_CODED_TEXT',
                                    'defining_code' => [
                                        'terminology_id' => [
                                            'value' => 'local',
                                        ],
                                        'code_string' => 'at0069',
                                    ],
                                    'value' => 'Maternal'
                                ],
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Date of birth',
                                ],
                                'archetype_node_id' => 'at0005',
                                'value' => [
                                    '_type' => 'DV_DATE_TIME',
                                    'value' => '1900-01-01 00:00:00',
                                ]
                            ],
                            [
                                '_type' => 'CLUSTER',
                                'name' => [
                                    'value' => 'Clinical history',
                                ],
                                'archetype_node_id' => 'at0008',
                                'items' => [
                                    [
                                        '_type' => 'ELEMENT',
                                        'name' => [
                                            'value' => 'Problem/diagnosis name',
                                        ],
                                        'archetype_node_id' => 'at0009',
                                        'value' => [
                                            '_type' => 'DV_CODED_TEXT',
                                            'defining_code' => [
                                                'terminology_id' => [
                                                    'value' => 'SNOMED-CT',
                                                ],
                                                'code_string' => '56265001',
                                            ],
                                            'value' => 'Heart disease',
                                        ],
                                    ],
                                    [
                                        '_type' => 'ELEMENT',
                                        'name' => [
                                            'value' => 'Age of onset',
                                        ],
                                        'archetype_node_id' => 'at0010',
                                        'value' => [
                                            '_type' => 'DV_DURATION',
                                            // TODO: check this is correct for duration
                                            // and if we need to be storing more
                                            // structured info like integers and units
                                            'value' => '90 years',
                                        ],
                                    ],
                                    [
                                        '_type' => 'ELEMENT',
                                        'name' => [
                                            'value' => 'Cause of death?',
                                        ],
                                        'archetype_node_id' => 'at0014',
                                        'value' => [
                                            '_type' => 'DV_CODED_TEXT',
                                            'defining_code' => [
                                                'terminology_id' => [
                                                    'value' => 'local',
                                                ],
                                                'code_string' => 'at0061',
                                            ],
                                            'value' => 'Direct cause or closely related',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Deceased?',
                                ],
                                'archetype_node_id' => 'at0023',
                                'value' => [
                                    '_type' => 'DV_BOOLEAN',
                                    'value' => true,
                                ]
                            ],
                            [
                                '_type' => 'ELEMENT',
                                'name' => [
                                    'value' => 'Date of death',
                                ],
                                'archetype_node_id' => 'at0058',
                                'value' => [
                                    '_type' => 'DV_DATE_TIME',
                                    'value' => '2020-01-01 00:00:00',
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $evaluation = new Evaluation($payload);

        $this->assertSame('openEHR-EHR-EVALUATION.family_history.v2', $evaluation->archetype_node_id);
        $this->assertInstanceOf('stdClass', $evaluation->data->items);
    }
}

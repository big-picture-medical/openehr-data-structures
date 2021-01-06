<?php

namespace Tests;

use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Evaluation;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class FamilyHistoryTest extends TestCase
{
    public function test_it_can_access_archtype_version(): void
    {
        $evaluation = new Evaluation($this->payload());

        $this->assertSame('openEHR-EHR-EVALUATION.family_history.v2', $evaluation->archetype_node_id);
    }

    public function test_it_can_access_relationship_degree(): void
    {
        $evaluation = new Evaluation($this->payload());

        $familyMembers = Collection::make($evaluation->data->items)
            ->keyBy('archetype_node_id')
            ->get('at0003');

        $relationshipDegree = Collection::make($familyMembers->items)
            ->keyBy('archetype_node_id')
            ->get('at0064');

        $codedText = $relationshipDegree->value;

        $this->assertSame('Second degree relative', $codedText->value);
    }

    private function payload()
    {
        return [
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
                // TODO: can we auto-cast arrays to Collections?
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
    }
}

<?php

namespace Tests;

use BigPictureMedical\OpenEhr\Rm\Composition\Composition;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Observation;
use BigPictureMedical\OpenEhr\ServiceProvider;
use PHPUnit\Framework\TestCase;

class CompositionTest extends TestCase
{
    public function setUp(): void
    {
        (new ServiceProvider(null))->boot();
    }

    public function test_it_compositions()
    {
        $composition = new Composition([
            '_type' => 'COMPOSITION',
            'archetype_node_id' => 'openEHR-EHR-COMPOSITION.encounter.v1',
            'name' => [
                'value' => 'Vital Signs'
            ],
            'uid' => [
                '_type' => 'OBJECT_VERSION_ID',
                'value' => '8849182c-82ad-4088-a07f-48ead4180515::openEHRSys.example.com::1'
            ],
            'archetype_details' => [
                'archetype_id' => [
                    'value' => 'openEHR-EHR-COMPOSITION.encounter.v1'
                ],
                'template_id' => [
                    'value' => 'Example.v1::c7ec861c-c413-39ff-9965-a198ebf44747'
                ],
                'rm_version' => '1.0.2'
            ],
            'language' => [
                'terminology_id' => [
                    'value' => 'ISO_639-1'
                ],
                'code_string' => 'en'
            ],
            'territory' => [
                'terminology_id' => [
                    'value' => 'ISO_3166-1'
                ],
                'code_string' => 'NL'
            ],
            'category' => [
                'value' => 'event',
                'defining_code' => [
                    'terminology_id' => [
                        'value' => 'openehr'
                    ],
                    'code_string' => '433'
                ]
            ],
            'composer' => [
                '_type' => 'PARTY_IDENTIFIED',
                'external_ref' => [
                    'id' => [
                        '_type' => 'GENERIC_ID',
                        'value' => '16b74749-e6aa-4945-b760-b42bdc07098a',
                        'scheme' => 'uuid'
                    ],
                    'namespace' => 'openEHRSys.example.com',
                    'type' => 'PERSON'
                ],
                'name' => 'A name'
            ],
            'context' => [
                'start_time' => [
                    'value' => '2014-11-18T09:50:35.000+01:00'
                ],
                'setting' => [
                    'value' => 'other care',
                    'defining_code' => [
                        'terminology_id' => [
                            'value' => 'openehr'
                        ],
                        'code_string' => '238'
                    ]
                ]
            ],
            'content' => [
                [
                    '_type' => 'OBSERVATION',
                    'archetype_node_id' => 'openEHR-EHR-OBSERVATION.blood_pressure.v2',
                    'name' => [
                        'value' => 'Blood pressure'
                    ],
                    'data' => [
                        'archetype_node_id' => 'at0001',
                        'name' => [
                            'value' => 'blah'
                        ],
                        'origin' => [
                            'value' => '2021-05-14 11:52:15',
                        ],
                        'events' => [
                            [
                                '_type' => 'POINT_EVENT',
                                'name' => [
                                    'value' => 'any event',
                                ],
                                'archetype_node_id' => 'at0006',
                                'time' => [
                                    'value' => '2021-05-14 11:52:15',
                                ],
                                'data' => [
                                    '_type' => 'ITEM_LIST',
                                    'archetype_node_id' => 'at0003',
                                    'name' => [
                                        'value' => 'data',
                                    ],
                                    'items' => [
                                        [
                                            '_type' => 'ELEMENT',
                                            'archetype_node_id' => 'at0004',
                                            'name' => [
                                                'value' => 'Systolic'
                                            ],
                                            'value' => [
                                                '_type' => 'DV_QUANTITY',
                                                'magnitude' => 120,
                                                'units' => 'mm[Hg]'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ],
                    ],
                    'language' => [
                        'terminology_id' => [
                            'value' => 'ISO_639-1'
                        ],
                        'code_string' => 'en',
                    ],
                    'encoding' => [
                        'terminology_id' => [
                            'value' => 'IANA_character-sets'
                        ],
                        'code_string' => 'UTF-8',
                    ],
                    'subject' => [
                        '_type' => 'PARTY_SELF'
                    ],
                    'provider' => [
                        '_type' => 'PARTY_IDENTIFIED',
                        'name' => 'Dr. Martha Jones'
                    ],
                ]
            ]
        ]);

        $observation = $composition->firstEntry('openEHR-EHR-OBSERVATION.blood_pressure.v2');

        $this->assertInstanceOf(Observation::class, $observation);

        $this->assertEquals(120, $observation->data->events[0]->data->items[0]->value->magnitude);
    }
}

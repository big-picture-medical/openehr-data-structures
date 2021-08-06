<?php

namespace Tests;

use BigPictureMedical\OpenEhr\PathQuery;
use BigPictureMedical\OpenEhr\Rm\Common\Generic\PartySelf;
use BigPictureMedical\OpenEhr\Rm\Composition\Composition;
use BigPictureMedical\OpenEhr\Rm\Composition\Content\Entry\Evaluation;
use BigPictureMedical\OpenEhr\Rm\DataStructures\ItemStructure\ItemTree;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Cluster;
use BigPictureMedical\OpenEhr\Rm\DataStructures\Representation\Element;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\CodePhrase;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvCodedText;
use BigPictureMedical\OpenEhr\Rm\DataTypes\Text\DvText;
use PHPUnit\Framework\TestCase;

class PathQueryTest extends TestCase
{
    public function test_it_finds_a_single_item()
    {
        $composition = $this->makeComposition();

        $result = (new PathQuery('content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value'))
            ->find($composition);

        $this->assertSame('Test value 1', $result);
    }

    public function test_it_handles_missing_paths_when_finding_a_single_item()
    {
        $composition = $this->makeComposition();

        $result = (new PathQuery('content[missing]/data/items[at0002]/items[at0003]/value/value'))
            ->find($composition);
        $this->assertSame(null, $result);

        $result = (new PathQuery('content[test-EVALUATION.test.v0]/missing/items[at0002]/items[at0003]/value/value'))
            ->find($composition);
        $this->assertSame(null, $result);

        $result = (new PathQuery('missing[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value'))
            ->find($composition);
        $this->assertSame(null, $result);
    }

    public function test_it_finds_a_list()
    {
        $composition = $this->makeComposition();

        $query = 'content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value';

        $result = (new PathQuery($query))->findList($composition);

        $this->assertSame([
            'Test value 1',
            'Test value 2',
            'Test value 3',
            'Test value 4',
        ], $result);
    }

    public function test_it_handles_missing_paths_when_finding_a_list()
    {
        $composition = $this->makeComposition();

        $result = (new PathQuery('content[missing]/data/items[at0002]/items[at0003]/value/value'))
            ->findList($composition);
        $this->assertSame([], $result);

        $result = (new PathQuery('content[test-EVALUATION.test.v0]/missing/items[at0002]/items[at0003]/value/value'))
            ->findList($composition);
        $this->assertSame([], $result);

        $result = (new PathQuery('missing[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value'))
            ->findList($composition);
        $this->assertSame([], $result);

        $result = (new PathQuery('test'))
            ->findList($composition);
        $this->assertSame([], $result);
    }

    private function makeComposition(): Composition
    {
        return new Composition(
            archetype_node_id: 'test-COMPOSITION.test.v0',
            name: new DvText(value: 'Test composition'),
            language: CodePhrase::make('test', 'test'),
            territory: CodePhrase::make('test', 'test'),
            category: DvCodedText::make('test', 'test', 'test'),
            composer: new PartySelf(),
            content: [
                new Evaluation(
                    archetype_node_id: 'test-EVALUATION.test.v0',
                    name: new DvText(value: 'Test evaluation'),
                    language: CodePhrase::make('test', 'test'),
                    encoding: CodePhrase::make('test', 'test'),
                    subject: new PartySelf(),
                    provider: new PartySelf(),
                    data: new ItemTree(
                        archetype_node_id: 'at0001',
                        name: new DvText(value: 'data'),
                        items: [
                            new Cluster(
                                name: new DvText(value: 'Test cluster'),
                                archetype_node_id: 'at0002',
                                items: [
                                    new Element(
                                        archetype_node_id: 'at0003',
                                        name: new DvText(value: 'Test element'),
                                        value: new DvText(value: 'Test value 1')
                                    ),
                                    new Element(
                                        archetype_node_id: 'at0003',
                                        name: new DvText(value: 'Test element'),
                                        value: new DvText(value: 'Test value 2')
                                    ),
                                ]
                            ),
                            new Cluster(
                                name: new DvText(value: 'Test cluster'),
                                archetype_node_id: 'at0002',
                                items: [
                                    new Element(
                                        archetype_node_id: 'at0003',
                                        name: new DvText(value: 'Test element'),
                                        value: new DvText(value: 'Test value 3')
                                    ),
                                    new Element(
                                        archetype_node_id: 'at0003',
                                        name: new DvText(value: 'Test element'),
                                        value: new DvText(value: 'Test value 4')
                                    ),
                                ]
                            ),
                        ],
                    ),
                ),
            ],
        );
    }
}

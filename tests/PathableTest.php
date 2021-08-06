<?php

namespace Tests;

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

class PathableTest extends TestCase
{
    public function test_it_finds_an_item_at_path()
    {
        $composition = $this->makeComposition();

        $result = $composition->itemAtPath('content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value');

        $this->assertSame('Test value 1', $result);
    }

    public function test_it_finds_items_at_path()
    {
        $composition = $this->makeComposition();

        $result = $composition->itemsAtPath('content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value');

        $this->assertSame([
            'Test value 1',
            'Test value 2',
            'Test value 3',
            'Test value 4',
        ], $result);
    }

    public function test_it_finds_whether_a_path_exists()
    {
        $composition = $this->makeComposition();

        $this->assertTrue($composition->pathExists('content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value'));
        $this->assertFalse($composition->pathExists('test'));
    }

    public function test_it_finds_whether_a_path_is_unique()
    {
        $composition = $this->makeComposition();

        $this->assertTrue($composition->pathUnique('content[test-EVALUATION.test.v0]/data'));
        $this->assertFalse($composition->pathUnique('content[test-EVALUATION.test.v0]/data/items[at0002]/items[at0003]/value/value'));
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

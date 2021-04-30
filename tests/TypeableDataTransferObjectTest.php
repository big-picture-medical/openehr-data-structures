<?php

namespace Tests;

use BigPictureMedical\OpenEhr\TypeableArrayCaster;
use BigPictureMedical\OpenEhr\TypeableDataTransferObject;
use BigPictureMedical\OpenEhr\TypeableDataTransferObjectCaster;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Attributes\CastWith;

class TypeableDataTransferObjectTest extends TestCase
{
    public function test_it_populates_abstract_properties_using_the_specified_type()
    {
        TypeableDataTransferObjectCaster::map('JESS', Jess::class);

        $test = new Test([
            'person' => [
                '_type' => 'JESS',
            ],
            'people' => [
                [
                    '_type' => 'JESS',
                ]
            ]
        ]);

        $this->assertInstanceOf(Jess::class, $test->person);
        $this->assertInstanceOf(Person::class, $test->people[0]);
    }
}

class Test extends TypeableDataTransferObject
{
    public Person $person;

    /** @var Person[] */
    #[CastWith(TypeableArrayCaster::class, itemType: Person::class)]
    public array $people;
}

abstract class Person extends TypeableDataTransferObject
{
}

class Jess extends Person
{
    public $_type = 'JESS';
}

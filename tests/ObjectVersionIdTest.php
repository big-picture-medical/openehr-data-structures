<?php

namespace Tests;

use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\ObjectVersionId;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\Uid;
use BigPictureMedical\OpenEhr\Base\BaseTypes\Identification\VersionTreeId;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Exceptions\ValidationException;

class ObjectVersionIdTest extends TestCase
{
    public function test_it_allows_access_to_individual_version_parts()
    {
        $objectVersionId = new ObjectVersionId(['value' => 'f98fb962-2f66-4810-bd9e-d3dba46fcdc5::example.openehr.org::1']);

        $this->assertInstanceOf(Uid::class, $objectVersionId->object_id());
        $this->assertEquals('f98fb962-2f66-4810-bd9e-d3dba46fcdc5', $objectVersionId->object_id()->value);

        $this->assertInstanceOf(Uid::class, $objectVersionId->creating_system_id());
        $this->assertEquals('example.openehr.org', $objectVersionId->creating_system_id()->value);

        $this->assertInstanceOf(VersionTreeId::class, $objectVersionId->version_tree_id());
        $this->assertEquals('1', $objectVersionId->version_tree_id()->value);
    }

    public function test_it_validates_badly_formatted_versions()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Value is not valid lexical form: object_id '::' creating_system_id '::' version_tree_id");

        new ObjectVersionId(['value' => 'bad']);
    }
}

<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class ReferenceTest extends TestCase
{
    public function testInstantiation(): void
    {
        $obj = new Reference();

        $this->assertTrue($obj instanceof Reference);
    }

    public function testCreateReferenceIsInstanceOfReference(): void
    {
        $obj = Reference::create('test');

        $this->assertTrue($obj instanceof Reference);
    }

    public function testIsArrayable(): void
    {
        $obj = new Reference();

        $this->assertTrue($obj instanceof ArrayableInterface);
        $this->assertTrue(method_exists($obj, 'toArray'));
    }

    public function testReferenceSetRef(): void
    {
        $obj = Reference::create('test.reference', 'override/');
        $this->assertEquals('override/test.reference', $obj->getRef());

        $obj = Reference::create('test.reference');
        $this->assertEquals('#/components/schemas/test.reference', $obj->getRef());

        $obj = Reference::create('test.reference', null);
        $this->assertEquals('test.reference', $obj->getRef());
    }

    public function testObjectToArray(): void
    {
        $obj = Reference::create('test.reference');
        $this->assertEquals(
            ['$ref' => '#/components/schemas/test.reference'],
            $obj->toArray()
        );
    }
}

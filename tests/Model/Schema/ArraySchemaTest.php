<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Schema\ArraySchema;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\Operation\Operation;
use Finderly\OpenapiPhpLib\Model\Reference;
use Finderly\OpenapiPhpLib\Model\Schema\ArraySchema;
use Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema;
use Finderly\OpenapiPhpLib\Model\Schema\SimpleSchema;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ArraySchemaTest extends TestCase
{
    public function testInstantiation(): void
    {
        $arraySchema = new ArraySchema();

        $this->assertTrue($arraySchema instanceof ArraySchema);
    }

    public function testCreateSchemaWithReference(): void
    {
        $reference = new Reference('test');
        $arraySchema = ArraySchema::createWithItems($reference);

        $this->assertEquals(
            $reference,
            $arraySchema->getItems()
        );
    }

    public function testCreateSchemaWithSimpleSchema(): void
    {
        $simpleSchema = new SimpleSchema();
        $arraySchema = ArraySchema::createWithItems($simpleSchema);

        $this->assertEquals(
            $simpleSchema,
            $arraySchema->getItems()
        );
    }

    public function testCreateSchemaWithInvalidItemsArray(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $arraySchema = ArraySchema::createWithItems([]);
    }

    public function testCreateSchemaWithInvalidItemsObjectSchema(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $arraySchema = ArraySchema::createWithItems($this->createStub(ObjectSchema::class));
    }

    public function testIsArrayable(): void
    {
        $arraySchema = new ArraySchema();

        $this->assertTrue($arraySchema instanceof ArrayableInterface);
        $this->assertTrue(method_exists($arraySchema, 'toArray'));
    }
}

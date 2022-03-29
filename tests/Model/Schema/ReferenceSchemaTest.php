<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Schema\ArraySchema;

use Finderly\OpenapiPhpLib\Model\Schema\ReferenceSchema;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ReferenceSchemaTest extends TestCase
{
    public function testInstantiateSchema(): void
    {
        $schema = new ReferenceSchema();

        $this->assertTrue($schema instanceof ReferenceSchema);
    }

    public function testCreateSchemaWithReference(): void
    {
        $schema = ReferenceSchema::create('test');

        $this->assertTrue($schema instanceof ReferenceSchema);
    }
}

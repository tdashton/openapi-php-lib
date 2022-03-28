<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\PathItem;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\Path\PathItem;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class PathItemTest extends TestCase
{

    public function testInstantiation(): void
    {
        $pathItem = new PathItem();

        $this->assertTrue($pathItem instanceof PathItem);
    }

    public function testIsArrayable(): void
    {
        $pathItem = new PathItem();

        $this->assertTrue($pathItem instanceof ArrayableInterface);
        $this->assertTrue(method_exists($pathItem, 'toArray'));
    }
}

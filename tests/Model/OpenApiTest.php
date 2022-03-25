<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use PHPUnit\Framework\TestCase;

/**
 * 
 */
class OpenApiTest extends TestCase
{
    public function testInstantiation(): void
    {
        $openApi = new OpenApi();

        $this->assertTrue($openApi instanceof OpenApi);
    }
}

<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\Component\Components;
use Finderly\OpenapiPhpLib\Model\Path\PathItem;
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

    public function testGetOpenApiObjectInfoAndVersionDefault(): void
    {
        $openApi = new OpenApi();
        $this->assertEquals(
            [
                'title' => 'Shpock API / OpenAPI Adapter',
                'version' => '0.0.9',
            ],
            $openApi->getInfo()
        );

        $this->assertEquals(OpenApi::OPENAPI_VERSION, $openApi->getOpenApi());
    }

    public function testGetOpenApiObjectInfoAndVersionOverride(): void
    {
        $override = [
            'title' => 'dodo',
            'version' => '1.0.0',
        ];

        $openApi = new OpenApi('9.9.9', $override);
        $this->assertEquals('9.9.9', $openApi->getOpenApi());
        $this->assertEquals($override, $openApi->getInfo());
    }

    public function testIsComponentsSet(): void
    {
        $openApi = new OpenApi();
        $this->assertTrue($openApi->getComponents() instanceof Components);
    }

    public function testCanAddPathItem(): void
    {
        $openApi = new OpenApi();
        $openApi->addPathItem('/test/', new PathItem());
        $this->assertTrue(
            $openApi->hasPathItem('/test/')
        );
    }

    public function testCanAddPathItemOvewrwritesSummary(): void
    {
        $openApi = new OpenApi();
        $openApi->addPathItem('/test/', (new PathItem())->setSummary('original summary'));
        $this->assertTrue(
            $openApi->hasPathItem('/test/')
        );
        $this->assertEquals('original summary', $openApi->getPathItem('/test/')->getSummary());
        $openApi->addPathItem('/test/', (new PathItem())->setSummary('new summary'));
        $this->assertEquals('new summary', $openApi->getPathItem('/test/')->getSummary());
    }
}

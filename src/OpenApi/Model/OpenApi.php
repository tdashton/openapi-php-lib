<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\Component\Components;
use Finderly\OpenapiPhpLib\Model\Path\PathItem;
use Finderly\OpenapiPhpLib\Model\Path\Paths;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#openapi-object
 */
class OpenApi implements ArrayableInterface
{
    use ArrayableTrait;

    public const OPENAPI_VERSION = '3.1.0';

    /**
     * @var string
     */
    protected $openapi;

    /**
     * @var array
     */
    protected $info = [
        'title' => 'Shpock API / OpenAPI Adapter',
        'version' => '0.0.9',
    ];

    private $__openApiProperties = [
        [
            'name' => 'openapi',
            'type' => 'string',
        ],
        [
            'name' => 'info',
            'type' => 'array',
        ],
        [
            'name' => 'components',
            'type' => 'object',
        ],
        [
            'name' => 'paths',
            'type' => 'object[k,v]',
        ],
    ];

    /**
     * @var \Finderly\OpenapiPhpLib\Model\Component\Components
     */
    public $components;

    /**
     * @see https://spec.openapis.org/oas/v3.1.0.html#paths-object
     *
     * @var \Finderly\OpenapiPhpLib\Model\Path\PathItem
     */
    public $paths;

    /**
     * OpenApi constructor.
     * @param string $openApiVersion
     * @param array|null $info
     */
    public function __construct(
        string $openApiVersion = self::OPENAPI_VERSION,
        ?array $info = null
    ) {
        $this->openapi = $openApiVersion;
        if (!is_null($info)) {
            $this->info = $info;
        }

        $this->components = new Components();
    }

    /**
     * @param string $urlPath
     * @param \Finderly\OpenapiPhpLib\Model\Path\PathItem $pathItem
     * @return self
     */
    public function pushPathItem(string $urlPath, PathItem $pathItem): self
    {
        if (!isset($this->paths[$urlPath])) {
            $this->paths[$urlPath] = [];
        }

        $this->paths[$urlPath] = $pathItem;

        return $this;
    }
}

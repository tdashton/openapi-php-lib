<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\Component\Components;
use Finderly\OpenapiPhpLib\Model\License\License;
use Finderly\OpenapiPhpLib\Model\Path\PathItem;
use Finderly\OpenapiPhpLib\Model\Path\Paths;
use Finderly\OpenapiPhpLib\Model\Server\Server;

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
     * @var License
     */
    protected $license;

    /**
     * @var Server[]
     */
    protected $servers = [];

    /**
     * @var array
     */
    protected $info = [
        'title' => 'OpenapiPhpLib Generated API / OpenAPI Adapter',
        'version' => '0.0.9',
    ];

    private $__openApiProperties = [
        [
            'name' => 'openapi',
            'type' => 'string',
        ],
        [
            'name' => 'license',
            'type' => 'object',
        ],
        [
            'name' => 'servers',
            'type' => 'object[]',
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
    protected $components;

    /**
     * @see https://spec.openapis.org/oas/v3.1.0.html#paths-object
     *
     * @var \Finderly\OpenapiPhpLib\Model\Path\PathItem
     */
    protected $paths;

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
     * @return string
     */
    public function getOpenApi(): string
    {
        return $this->openapi;
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return $this->info;
    }

    /**
     * @return array
     */
    public function getComponents(): Components
    {
        return $this->components;
    }

    /**
     * @param string $urlPath
     * @return bool
     */
    public function hasPathItem(string $urlPath): bool
    {
        return isset($this->paths[$urlPath]);
    }

    /**
     * @param string $urlPath
     * @return null|PathItem
     */
    public function getPathItem(string $urlPath): ?PathItem
    {
        return $this->paths[$urlPath] ?? null;
    }

    /**
     * @param string $urlPath
     * @param \Finderly\OpenapiPhpLib\Model\Path\PathItem $pathItem
     * @return self
     */
    public function addPathItem(string $urlPath, PathItem $pathItem): self
    {
        $this->paths[$urlPath] = $pathItem;

        return $this;
    }

    /**
     * @param Server $server
     * @return self
     */
    public function addServer(Server $server): self
    {
        $this->servers[] = $server;

        return $this;
    }

    /**
     * @param Server[] $servers
     * @return OpenApi
     */
    public function setServers(array $servers): self
    {
        $this->servers = $servers;

        return $this;
    }

    /**
     * @return Server[]
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * @param License $license
     * @return OpenApi
     */
    public function setLicense(License $license): self
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return License
     */
    public function getLicense(): License
    {
        return $this->license;
    }
}

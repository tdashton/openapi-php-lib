<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Component;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Schema\SchemaInterface;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#components-object
 */
class Components implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var SchemaInterface[]
     */
    protected $schemas = [];

//    public $responses = [];

//    public $headers = [];

    private $__openApiProperties = [
        [
            'name' => 'schemas',
            'type' => 'object[k,v]',
        ],
        [
            'name' => 'parameters',
            'type' => 'object[k,v]',
        ],
    ];

    /**
     * @var Parameter[]
     */
    protected $parameters = [];

    /**
     * @param string $key
     * @return bool
     */
    public function hasSchema(string $key): bool
    {
        return isset($this->schemas[$key]);
    }

    /**
     * @param string $key
     * @param SchemaInterface $schema
     */
    public function addSchema(string $key, SchemaInterface $schema)
    {
        if ($this->hasSchema($key)) {
            throw new \InvalidArgumentException("The schema {$key} is already defined");
        }

        $this->schemas[$key] = $schema;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasParameter(string $key): bool
    {
        return isset($this->schemas[$key]);
    }

    /**
     * @param string $key
     * @param Parameter $schema
     */
    public function addParameter(string $key, Parameter $schema)
    {
        if ($this->hasParameter($key)) {
            throw new \InvalidArgumentException("The schema {$key} is already defined");
        }

        $this->schemas[$key] = $schema;
    }
}

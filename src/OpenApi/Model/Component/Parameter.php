<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Component;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#parameter-object
 */
class Parameter implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $in;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema|\Shpock\API\Component\OpenApi\Model\Reference
     */
    protected $schema;

    private $__openApiProperties = [
        [
            'name' => 'name',
            'type' => 'string',
        ],
        [
            'name' => 'in',
            'type' => 'string',
        ],
        [
            'name' => 'description',
            'type' => 'string',
        ],
        [
            'name' => 'schema',
            'type' => 'object',
        ],
    ];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Parameter
     */
    public function setName(string $name): Parameter
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIn(): string
    {
        return $this->in;
    }

    /**
     * @param string $in
     * @return Parameter
     */
    public function setIn(string $in): Parameter
    {
        $this->in = $in;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Parameter
     */
    public function setDescription(string $description): Parameter
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema|\Shpock\API\Component\OpenApi\Model\Reference
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param \Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema|\Shpock\API\Component\OpenApi\Model\Reference $schema
     * @return Parameter
     */
    public function setSchema($schema): Parameter
    {
        $this->schema = $schema;

        return $this;
    }
}

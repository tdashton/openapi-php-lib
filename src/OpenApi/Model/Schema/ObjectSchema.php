<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Schema;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#schema-object
 */
class ObjectSchema implements SchemaInterface, ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $type = 'object';

    /**
     * @var string
     */
    protected $description;

    /**
     * @var SimpleSchema[]
     */
    protected $properties = [];

    /**
     * @var array
     */
    protected $required = [];

    private $__openApiProperties = [
        [
            'name' => 'type',
            'type' => 'string',
        ],
        [
            'name' => 'description',
            'type' => 'string',
        ],
        [
            'name' => 'properties',
            'type' => 'object[]',
        ],
        [
            'name' => 'required',
            'type' => 'array',
        ],
    ];

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ObjectSchema
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * This should be an associative array..
     *
     * @deprecated please favor the usage of pushProperty wherever possible
     * @param array $properties
     * @return ObjectSchema
     */
    public function setProperties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * @param string $propertyName
     * @param SchemaInterface $schema
     * @return $this
     */
    public function addProperty(string $propertyName, SchemaInterface $schema): self
    {
        $this->properties[$propertyName] = $schema;

        return $this;
    }

    /**
     * @return array
     */
    public function getRequired(): array
    {
        return $this->required;
    }

    /**
     * @param string[] $required
     * @return ObjectSchema
     */
    public function setRequired(array $required): self
    {
        $this->required = $required;

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
     * @return ObjectSchema
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

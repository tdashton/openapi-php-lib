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
class SimpleSchema implements SchemaInterface, ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $required = false;

    /**
     * @var mixed
     */
    protected $default;

    /**
     * @var int
     */
    protected $minLength;

    /**
     * @var int
     */
    protected $maxLength;

    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var string[]
     */
    protected $enum;

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
            'name' => 'required',
            'type' => 'bool',
        ],
        [
            'name' => 'default', // @todo this should be dependent on the type
            'type' => 'mixed',
        ],
        [
            'name' => 'minLength',
            'type' => 'int',
        ],
        [
            'name' => 'maxLength',
            'type' => 'int',
        ],
        [
            'name' => 'pattern',
            'type' => 'string',
        ],
        [
            'name' => 'enum',
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return SimpleSchema
     */
    public function setDescription(string $description): SimpleSchema
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     * @return SimpleSchema
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param $default
     * @return SimpleSchema
     */
    public function setDefault($default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * @param int $minLength
     * @return SimpleSchema
     */
    public function setMinLength(int $minLength): SimpleSchema
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     * @return SimpleSchema
     */
    public function setMaxLength(int $maxLength): SimpleSchema
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     * @return SimpleSchema
     */
    public function setPattern(string $pattern): SimpleSchema
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @param string[] $enum
     * @return SimpleSchema
     */
    public function setEnum(array $enum): SimpleSchema
    {
        $this->enum = $enum;

        return $this;
    }
}

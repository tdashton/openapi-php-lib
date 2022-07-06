<?php

namespace Finderly\OpenapiPhpLib\Model\Server;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#server-variable-object
 */
class Variable implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $default;

    /**
     * @var string[]
     */
    protected $enum;

    /**
     * @var string
     */
    protected $description;

    private $__openApiProperties = [
        [
            'name' => 'default',
            'type' => 'string',
        ],
        [
            'name' => 'enum',
            'type' => 'array',
        ],
        [
            'name' => 'description',
            'type' => 'string',
        ],
    ];

    /**
     * @param string $default
     * @return Variable
     */
    public function setDefault(string $default): Variable
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * @param string[] $enum
     * @return Variable
     */
    public function setEnum(array $enum): Variable
    {
        $this->enum = $enum;

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
     * @param string $description
     * @return Variable
     */
    public function setDescription(string $description): Variable
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}

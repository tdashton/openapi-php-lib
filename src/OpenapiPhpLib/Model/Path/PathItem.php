<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Path;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Component\Parameter;
use Finderly\OpenapiPhpLib\Model\Operation\Operation;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#path-item-object
 */
class PathItem implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     *  Operation[]
     */
    protected $get;

    /**
     *  Operation[]
     */
    protected $put;

    /**
     * Operation[]
     */
    protected $post;

    /**
     * Operation[]
     */
    protected $delete;

    /**
     *  Operation[]
     */
    protected $options;

    /**
     * Operation[]
     */
    protected $head;

    /**
     * Operation[]
     */
    protected $patch;

    /**
     * A definition of a TRACE operation on this path.
     * Operation[]
     */
    protected $trace;

    /**
     * An optional, string summary, intended to apply to all operations in this path.
     * @var string
     */
    protected $summary;

    /**
     * An optional, string description, intended to apply to all operations in this path. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    protected $description;

    /**
     * @var Parameter[]
     */
    protected $parameters;

    private $__openApiProperties = [
        [
            'name' => 'get',
            'type' => 'object',
        ],
        [
            'name' => 'put',
            'type' => 'object',
        ],
        [
            'name' => 'post',
            'type' => 'object',
        ],
        [
            'name' => 'delete',
            'type' => 'object',
        ],
        [
            'name' => 'options',
            'type' => 'object',
        ],
        [
            'name' => 'head',
            'type' => 'object',
        ],
        [
            'name' => 'patch',
            'type' => 'object',
        ],
        [
            'name' => 'trace',
            'type' => 'object',
        ],
        [
            'name' => 'summary',
            'type' => 'string',
        ],
        [
            'name' => 'description',
            'type' => 'string',
        ],
        [
            'name' => 'parameters',
            'type' => 'object[]',
        ],
    ];

    /**
     * @param string $method
     * @return bool
     */
    private function isValidOperation(string $method): bool
    {
        return in_array($method, ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace']);
    }

    /**
     * @param string $method
     * @param Operation $operation
     */
    public function setOperation(string $method, Operation $operation)
    {
        if (!$this->isValidOperation($method)) {
            throw new \InvalidArgumentException("Method '$method' does not exist");
        }

        $this->$method = $operation;
    }

    /**
     * @param string $method
     * @return null|Operation
     */
    public function getOperation(string $method): ?Operation
    {
        if (!$this->isValidOperation($method)) {
            throw new \InvalidArgumentException("Method '$method' does not exist");
        }

        return $this->$method;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return PathItem
     */
    public function setSummary(string $summary): PathItem
    {
        $this->summary = $summary;

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
     * @return PathItem
     */
    public function setDescription(string $description): PathItem
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param Parameter[] $parameters
     * @return PathItem
     */
    public function setParameters(array $parameters): PathItem
    {
        $this->parameters = $parameters;

        return $this;
    }
}

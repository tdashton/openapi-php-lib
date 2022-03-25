<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Schema;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Reference;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#schema-object
 */
class ArraySchema implements SchemaInterface, ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $type = 'array';

    /**
     * @var SimpleSchema|Reference
     */
    protected $items;

    private $__openApiProperties = [
        [
            'name' => 'type',
            'type' => 'string',
        ],
        [
            'name' => 'items',
            'type' => 'object',
        ],
    ];

    /**
     * @param $items
     * @return static
     */
    public static function createWithItems($items): self
    {
        if (!($items instanceof SimpleSchema) && !($items instanceof Reference)) {
            throw new \InvalidArgumentException('Items must be a SimpleSchema or Reference');
        }

        $clazz = new static();
        $clazz->setItems($items);

        return $clazz;
    }

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
     * @return Reference|SimpleSchema
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Reference|SimpleSchema $items
     * @return ArraySchema
     */
    public function setItems($items): self
    {
        $this->items = $items;

        return $this;
    }
}

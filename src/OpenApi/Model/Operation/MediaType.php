<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Operation;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Reference;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#media-type-object
 */
class MediaType implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var \Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema|\Shpock\API\Component\OpenApi\Model\Reference
     */
    protected $schema;

    private $__openApiProperties = [
        [
            'name' => 'schema',
            'type' => 'object',
        ],
    ];

    /**
     * @param Reference $reference
     * @return static
     */
    public static function createWithReference(Reference $reference): self
    {
        $clazz = new static();
        $clazz->schema = $reference;

        return $clazz;
    }

    /**
     * @return \Finderly\OpenapiPhpLib\Model\Schema\ObjectSchema|\Shpock\API\Component\OpenApi\Model\Reference
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param \Finderly\OpenapiPhpLib\Model\Schema\SchemaInterface|\Shpock\API\Component\OpenApi\Model\Reference $schema
     * @return MediaType
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#reference-object
 */
class Reference implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $ref;

    private $__openApiProperties = [
        [
            'name' => 'ref',
            'openApiName' => '$ref',
            'type' => 'string',
        ],
    ];

    /**
     * @param string $reference
     * @param string|null $prefix
     * @return static
     */
    public static function create(string $reference, ?string $prefix = '#/components/schemas/')
    {
        $clazz = new static();
        if (empty($prefix)) {
            $clazz->setRef($reference);
        } else {
            $clazz->setRef($prefix . $reference);
        }

        return $clazz;
    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     * @return Reference
     */
    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }
}

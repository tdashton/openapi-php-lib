<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Operation;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#request-body-object
 */
class RequestBody implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $description;

    /**
     * Map[string, Media Type Object]
     * @var MediaType[]
     */
    protected $content;

    /**
     * @var bool
     */
    protected $required = false;

    private $__openApiProperties = [
        [
            'name' => 'description',
            'type' => 'string',
        ],
        [
            'name' => 'content',
            'type' => 'object[k,v]',
        ],
    ];

    /**
     * @param string $contentType
     * @param MediaType $mediaType
     */
    public function addContent(string $contentType, MediaType $mediaType)
    {
        $this->content[$contentType] = $mediaType;
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
     * @return RequestBody
     */
    public function setDescription(string $description): RequestBody
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param array $content
     * @return RequestBody
     */
    public function setContent(array $content): RequestBody
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     * @return RequestBody
     */
    public function setRequired(bool $required): RequestBody
    {
        $this->required = $required;

        return $this;
    }
}

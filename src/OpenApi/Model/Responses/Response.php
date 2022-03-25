<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Responses;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Operation\MediaType;
use Finderly\OpenapiPhpLib\Model\Operation\RequestBody;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 * @see https://spec.openapis.org/oas/v3.1.0.html#response-object
 */
class Response implements ArrayableInterface
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
     * @return Response
     */
    public function addContent(string $contentType, MediaType $mediaType): self
    {
        $this->content[$contentType] = $mediaType;

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
    public function setContent(array $content): Response
    {
        $this->content = $content;

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
     * @return Response
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

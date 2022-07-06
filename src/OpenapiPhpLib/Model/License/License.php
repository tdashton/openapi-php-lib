<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\License;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#license-object
 */
class License implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $url;

    private $__openApiProperties = [
        [
            'name' => 'name',
            'type' => 'string',
        ],
        [
            'name' => 'identifier',
            'type' => 'string',
        ],
        [
            'name' => 'url',
            'type' => 'string',
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
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}

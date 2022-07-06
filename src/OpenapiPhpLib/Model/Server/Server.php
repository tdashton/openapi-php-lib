<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Server;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#server-object
 */
class Server implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Variable[]
     */
    protected $variables = [];

    private $__openApiProperties = [
        [
            'name' => 'url',
            'type' => 'string',
        ],
        [
            'name' => 'description',
            'type' => 'string',
        ],
        [
            'name' => 'variables',
            'type' => 'object[k,v]',
        ],
    ];

    /**
     * @param string $url
     * @return Server
     */
    public function setUrl(string $url): Server
    {
        $this->url = $url;

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
     * @param string $description
     * @return Server
     */
    public function setDescription(string $description): Server
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

    /**
     * @param string $variableName
     * @param Variable $variable
     * @return Server
     */
    public function addVariable(string $variableName, Variable $variable): Server
    {
        $this->variables[$variableName] = $variable;

        return $this;
    }

    /**
     * @param string $variables
     * @return Server
     */
    public function setVariables(string $variables): Server
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * @return Variable[]
     */
    public function getVariables(): array
    {
        return $this->variables;
    }
}

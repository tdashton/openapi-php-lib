<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Operation;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;
use Finderly\OpenapiPhpLib\Model\Component\Parameter;
use Finderly\OpenapiPhpLib\Model\Reference;
use Finderly\OpenapiPhpLib\Model\Responses\Response;
use Finderly\OpenapiPhpLib\Model\Responses\Responses;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#operation-object
 */
class Operation implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * A short summary of what the operation does.
     * @var string
     */
    protected $summary;

    /**
     * A verbose explanation of the operation behavior. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    protected $description;

    /**
     * @var Parameter[]
     */
    protected $parameters = [];

    /**
     * @var RequestBody
     */
    protected $requestBody;

    /**
     * @var \Finderly\OpenapiPhpLib\Model\Responses\Response[]
     */
    protected $responses;

    private $__openApiProperties = [
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
        [
            'name' => 'requestBody',
            'type' => 'object',
        ],
        [
            'name' => 'responses',
            'type' => 'object[k,v]',
        ],
    ];

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Operation
     */
    public function setSummary(string $summary): Operation
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
     * @return Operation
     */
    public function setDescription(string $description): Operation
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
     * @return Operation
     */
    public function setParameters(array $parameters): Operation
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return RequestBody
     */
    public function getRequestBody(): RequestBody
    {
        return $this->requestBody;
    }

    /**
     * @param RequestBody $requestBody
     * @return Operation
     */
    public function setRequestBody(RequestBody $requestBody): Operation
    {
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * @param string $httpStatusCode
     * @param \Finderly\OpenapiPhpLib\Model\Responses\Response|\Shpock\API\Component\OpenApi\Model\Reference $response
     * @return \Finderly\OpenapiPhpLib\Model\Responses\Responses
     */
    public function pushResponseCode(string $httpStatusCode, $response): self
    {
        if (!($response instanceof Response) && !($response instanceof Reference)) {
            throw new \InvalidArgumentException('Must be a Response or a Reference');
        }

        $this->responses[$httpStatusCode] = $response;

        return $this;
    }

    /**
     * @return array
     */
    public function getResponses(): array
    {
        return $this->responses;
    }

    /**
     * @param Responses $responses
     * @return Operation
     */
    public function setResponses(Responses $responses): Operation
    {
        $this->responses = $responses;

        return $this;
    }
}

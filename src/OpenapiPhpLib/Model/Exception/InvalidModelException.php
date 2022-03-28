<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Exception;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 */
class InvalidModelException extends \Exception
{
    /**
     * @var array
     */
    protected $invalidFields = [];

    /**
     *
     */
    public function __construct(
        string $modelName,
        array $invalidFields = []
    ) {
        $this->invalidFields = $invalidFields;

        parent::__construct(sprintf('"%s" definition is invalid', $modelName));
    }

    /**
     *
     */
    public function getInvalidFields(): array
    {
        return $this->invalidFields;
    }
}

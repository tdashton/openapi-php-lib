<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 *
 */
class ArrayableTraitTestValidModel implements ArrayableInterface
{
    use ArrayableTrait;

    protected $stringField;

    protected $arrayField;

    protected $boolField;

    protected $intField;

    protected $objectField;

    protected $keyValueObjectField;

    private $__openApiProperties = [
        [
            'name' => 'stringField',
            'type' => 'string',
        ],
        [
            'name' => 'arrayField',
            'type' => 'array',
        ],
        [
            'name' => 'boolField',
            'type' => 'bool',
        ],
        [
            'name' => 'intField',
            'type' => 'int',
        ],
        [
            'name' => 'objectField',
            'type' => 'object',
        ],
        [
            'name' => 'keyValueObjectField',
            'type' => 'object[k,v]',
        ],
    ];
}

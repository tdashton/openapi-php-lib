<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\ArrayableTrait;

/**
 *
 */
class ArrayableTraitTestInvalidModel implements ArrayableInterface
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
            'namex' => 'stringField',
            'typex' => 'string',
        ],
        [
            'namex' => 'arrayField',
            'type' => 'array',
        ],
        [
            'name' => 'boolField',
            'typex' => 'bool',
        ],
        [
            'namex' => 'intField',
            'typex' => 'int',
        ],
        [
            'name' => 'objectField',
            'type' => 'object',
        ],
        [
            'namex' => 'keyValueObjectField',
            'type' => 'object[k,v]',
        ],
    ];
}

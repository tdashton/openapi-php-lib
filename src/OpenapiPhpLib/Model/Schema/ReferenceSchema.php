<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model\Schema;

use Finderly\OpenapiPhpLib\Model\ArrayableInterface;
use Finderly\OpenapiPhpLib\Model\Reference;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * @see https://spec.openapis.org/oas/v3.1.0.html#reference-object
 *
 * An object specifically for use as a reference object inside of a schema
 */
class ReferenceSchema extends Reference implements SchemaInterface, ArrayableInterface
{
}

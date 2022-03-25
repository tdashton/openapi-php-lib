<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 */
abstract class OpenApiGenerator
{
    /**
     * @return array
     */
    abstract public function generateSpecification(): array;
}

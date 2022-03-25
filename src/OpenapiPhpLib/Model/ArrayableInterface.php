<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

/**
 * @author Herr Tyler <tdashton@gmail.com>
 *
 * Returns an array representing this object.
 */
interface ArrayableInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}

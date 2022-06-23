<?php

namespace Finderly\OpenapiPhpLib\Exporter;

use Finderly\OpenapiPhpLib\OpenApiGenerator;

interface OpenApiExporterInterface
{
    public function __construct(OpenApiGenerator $generator);

    public function exportFile(string $path);
}

<?php

namespace Finderly\OpenapiPhpLib\Exporter;

use Finderly\OpenapiPhpLib\OpenApiGenerator;

class OpenApiJsonExporter implements OpenApiExporterInterface
{
    protected $generator;

    public function __construct(OpenApiGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function exportFile(string $path)
    {
        file_put_contents(
            $path,
            \json_encode(
                $this->generator->generateSpecification()
            )
        );
    }
}

<?php

namespace Finderly\OpenapiPhpLib\Exporter;

use Finderly\OpenapiPhpLib\OpenApiGenerator;

class JsonEncoder implements OpenApiExporterInterface
{
    protected $generator;

    public function __construct(OpenApiGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function exportFile(string $path, array $options = [])
    {
        if (isset($options['json_encode_options'])) {
            $options = $options['json_encode_options'];
        }

        file_put_contents(
            $path,
            \json_encode(
                $this->generator->generateSpecification(),
                $options
            )
        );
    }
}

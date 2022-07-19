# openapi-php-lib

A PHP Library to assist in creation of OpenApi Specifications

# Supported OpenApi Version

[Version 3.1.0](https://spec.openapis.org/oas/v3.1.0.html).

# Supported Output Formats

Currently the library supports converting the OpenApi spec to an array which can easily be encoded as JSON in an endpoint or serialized for caching and later delivery as JSON.

[Support for YAML](https://spec.openapis.org/oas/v3.1.0.html#format) as per the spec is not yet directly supported.

# Example Usage

## Export Schema as JSON

```php
// Class: MyDomainOpenApiGenerator.php

public class MyDomainOpenApiGenerator extends \Finderly\OpenapiPhpLib\OpenApiGenerator
{
    public function __construct(/* inject your dependencies here */) {}

    /**
     * your generation logic goes here, sample below
     * @return array
     */
    public function generateSpecification(): array
    {
        $mySchemas = $myPaths = [/* your domain logic here to populate these vars */];

        $openApi = new \Finderly\OpenapiPhpLib\Model\OpenApi(
            \Finderly\OpenapiPhpLib\Model\OpenApi::OPENAPI_VERSION,
            ['title' => 'My Spec\'s title', 'version' => 'My spec\'s version']
        );

        // add global schemas
        foreach ($mySchemas as $mySchema) {
            // $mySchema is your domain logic
            $openApi->getComponents()->addSchema(
                $mySchema->translateToOpenapiPhpLibSchemaName(),
                $mySchema->translateToOpenapiPhpLibSchema()
            );
        }

        foreach ($myPaths as $myPath) {
            // $myPath is your domain logic
            $pathItem = new \Finderly\OpenapiPhpLib\Model\Path\PathItem();
            $pathItem->setParameters(
                $myPath->translateToOpenapiPhpLibParameters()
            );

            foreach ($myPath->getSupportedHttpOperations() as $method) {
                $operation = $method->translateToOpenapiPhpLibOperation();
                $pathItem->setOperation(strtolower($method->getHttpMethod()), $operation);
            }

            $openApi->addPathItem($myPath->getHttpPath(), $pathItem);
        }

        return $openApi->toArray();
    }
}

// File: generation_command.php

$openApiGenerator = new MyDomainOpenApiGenerator();

$exporter = new \Finderly\OpenapiPhpLib\Exporter\OpenApiJsonExporter(
    $openApiGenerator
);

$exporter->exportFile('/path/to/file.json');
```

# Contributing and Completeness

## Supported OpenApi Objects

The following objects are currently supported:

- [body-object](https://spec.openapis.org/oas/v3.1.0.html#request-body-object)
- [components-object](https://spec.openapis.org/oas/v3.1.0.html#components-object)
- [item-object](https://spec.openapis.org/oas/v3.1.0.html#path-item-object)
- [license-object](https://spec.openapis.org/oas/v3.1.0.html#license-object)
- [openapi-object](https://spec.openapis.org/oas/v3.1.0.html#openapi-object)
- [operation-object](https://spec.openapis.org/oas/v3.1.0.html#operation-object)
- [parameter-object](https://spec.openapis.org/oas/v3.1.0.html#parameter-object)
- [paths-object](https://spec.openapis.org/oas/v3.1.0.html#paths-object)
- [reference-object](https://spec.openapis.org/oas/v3.1.0.html#reference-object)
- [response-object](https://spec.openapis.org/oas/v3.1.0.html#response-object)
- [schema-object](https://spec.openapis.org/oas/v3.1.0.html#schema-object)
- [server-object](https://spec.openapis.org/oas/v3.1.0.html#server-object)
- [type-object](https://spec.openapis.org/oas/v3.1.0.html#media-type-object)
- [variable-object](https://spec.openapis.org/oas/v3.1.0.html#server-variable-object)

If you do not see what you are looking for in this list, please contact us or contribute it!

## Contributing

New objects can be added relatively easily by mapping them using the following variables types.

### Variable Types

#### Basic

- `string`
- `array `
- `bool`
- `int`

When rendering the spec these variable types are treated as their standard variable type.

#### Objects

- `object`
- `object[]`
- `object[k,v]`

When rendering the spec these variable types are recursed. An `object` is recursed. An `object[]` is a treated as a simple array of objects. The ["Paths"](https://spec.openapis.org/oas/v3.1.0.html#paths-object) and any "Map[string, OpenApi Object Type" is handled as a `object[k,v]`.

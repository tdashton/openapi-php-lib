# openapi-php-lib

A PHP Library to assist in creation of OpenApi Specifications

# variable types

## basic

- `string`
- `array `
- `bool`
- `int`

When rendering the spec these variable types are treated as their standard variable type.

## objects

- `object`
- `object[]`
- `object[k,v]`

When rendering the spec these variable types are recursed. An `object` is recursed. An `object[]` is a treated as a simple array of objects. The ["Paths"](https://spec.openapis.org/oas/v3.1.0.html#paths-object) and any "Map[string, OpenApi Object Type" is handled as a `object[k,v]`.

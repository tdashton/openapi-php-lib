<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\Exception\InvalidModelException;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ArrayableTraitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $model = new ArrayableTraitTestValidModel();

        $this->assertTrue($model instanceof ArrayableTraitTestValidModel);
    }

    public function testArePropertiesValid(): void
    {
        $model = new ArrayableTraitTestValidModel();

        $this->assertTrue($model->areModelPropertiesValid());
    }

    public function testIsModelInvalid(): void
    {
        $model = new ArrayableTraitTestInvalidModel();

        $ime = null;
        try {
            $model->areModelPropertiesValid();
        } catch (InvalidModelException $ime) {
        }

        $this->assertNotNull($ime);
        $this->assertEquals(5, count($ime->getInvalidFields()));
    }

    public function testModelPropertyMissingClassProperty(): void
    {
        $model = new class() implements ArrayableInterface {
            use ArrayableTrait;

            protected $exists;

            // protected $missing = 'doNotFilterValue';

            private $__openApiProperties = [
                [
                    'name' => 'exists',
                    'type' => 'string',
                ],
                [
                    'name' => 'missing',
                    'type' => 'string',
                ],
            ];
        };

        $ime = null;
        try {
            $model->areModelPropertiesValid();
        } catch (InvalidModelException $ime) {
        }

        $this->assertNotNull($ime);
        $this->assertEquals(1, count($ime->getInvalidFields()));
        $this->assertEquals(
            [
                [
                    'name' => 'missing',
                    'type' => 'string',
                ],
            ],
            $ime->getInvalidFields()
        );
    }

    public function testModelMissingProperties(): void
    {
        $model = new class() implements ArrayableInterface {
            use ArrayableTrait;

            protected $invalid = 'alreadyInvalid';

            // private $__openApiProperties = [
            //     [
            //         'name' => 'nothingDefined',
            //         'type' => 'nothing',
            //     ],
            // ];
        };

        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('You can only trait classes that have defined __openApiProperties');
        $model->toArray();
    }

    public function testModelPropertyTypeIsInvalid(): void
    {
        $model = new class() implements ArrayableInterface {
            use ArrayableTrait;

            protected $invalid = 'alreadyInvalid';

            private $__openApiProperties = [
                [
                    'name' => 'invalid',
                    'type' => 'invalid',
                ],
            ];
        };

        $ime = null;
        try {
            $model->areModelPropertiesValid();
        } catch (InvalidModelException $ime) {
        }

        $this->assertNotNull($ime);
        $this->assertEquals(1, count($ime->getInvalidFields()));
        $this->assertEquals(
            [
                [
                    'name' => 'invalid',
                    'type' => 'invalid',
                ],
            ],
            $ime->getInvalidFields()
        );
    }

    public function testModelPropertyToArrayFiltersNullProperties(): void
    {
        $model = new class() implements ArrayableInterface {
            use ArrayableTrait;

            protected $filter;

            protected $doNotFilter = 'doNotFilterValue';

            private $__openApiProperties = [
                [
                    'name' => 'filter',
                    'type' => 'string',
                ],
                [
                    'name' => 'doNotFilter',
                    'type' => 'string',
                ],
            ];
        };

        $this->assertEquals(
            ['doNotFilter' => 'doNotFilterValue'],
            $model->toArray()
        );
    }
}

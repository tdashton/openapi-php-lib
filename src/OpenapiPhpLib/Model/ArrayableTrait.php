<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

use Finderly\OpenapiPhpLib\Model\Exception\InvalidModelException;

trait ArrayableTrait
{
    /**
     * @throws InvalidModelException
     */
    public function areModelPropertiesValid(): void
    {
        if (!isset($this->__openApiProperties) || !is_array($this->__openApiProperties)) {
            throw new \DomainException('You can only trait classes that have defined __openApiProperties');
        }

        $invalidFields = array_filter(
            $this->__openApiProperties,
            function (array $property): bool {
                return !$this->isPropertyValid($property);
            }
        );

        if (count($invalidFields) !== 0) {
            throw new InvalidModelException(self::class, array_values($invalidFields));
        }
    }

    /**
     * @param array $propertyDefinition
     * @return bool
     */
    public function isPropertyValid(array $propertyDefinition): bool
    {
        if (!isset($propertyDefinition['name']) || !isset($propertyDefinition['type'])) {
            return false;
        }

        if (!$this->isKnownPropertyDefinitionType($propertyDefinition['type'])) {
            return false;
        }

        return property_exists($this, $propertyDefinition['name']);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $this->areModelPropertiesValid();

        $ret = [];
        foreach ($this->__openApiProperties as $propertyDefinition) {
            if (($res = $this->getValue($propertyDefinition)) !== null) {
                $propertyName = $propertyDefinition['openApiName'] ?? $propertyDefinition['name'];

                $ret[$propertyName] = $res;
            }
        }

        return $ret;
    }

    /**
     * @return bool
     */
    protected function isKnownPropertyDefinitionType(string $type): bool
    {
        return in_array(
            $type,
            [
                'object[k,v]',
                'object',
                'object[]',
                'string',
                'string[]',
                'mixed',
                'int',
                'bool',
                'array',
            ],
            true
        );
    }

    /**
     * @param array $propertyDefinition
     * @return array|null|\stdClass
     */
    protected function getValue(array $propertyDefinition)
    {
        $this->areModelPropertiesValid();

        $propertyName = $propertyDefinition['name'];
        $propertyType = $propertyDefinition['type'];
        if (!$this->isKnownPropertyDefinitionType($propertyType)) {
            throw new \DomainException(
                sprintf('Property type "%s" is unknown', $propertyType)
            );
        }
        if (is_null($this->{$propertyName}) || (is_array($this->{$propertyName}) && empty($this->{$propertyName}))) {
            return null;
        }

        switch ($propertyType) {
            case 'object[k,v]':
                $ret = [];
                foreach ($this->{$propertyName} as $key => $value) {
                    if ($value instanceof ArrayableInterface) {
                        if (empty($value)) {
                            $ret[$key] = new \stdClass();
                        } else {
                            $ret[$key] = $value->toArray();
                        }

                    } else {
                        $ret[$key] = $value;
                    }
                }
                return $ret;
                break;
            case 'object':
                return empty($ret = $this->{$propertyName}->toArray()) ? new \stdClass() : $ret;
                break;
            case 'object[]':
                return array_map(
                    function (ArrayableInterface $element) {
                        return $element->toArray();
                    },
                    $this->{$propertyName}
                );
                break;
            case 'string':
            case 'mixed':
            case 'int':
            case 'bool':
            case 'array':
                return $this->{$propertyName};
                break;
            default:
                // this case should never be reachable unless modifying this logic itself
                throw new \LogicException(
                    'You done broke ' . __FUNCTION__ . ', you\'d better fix it up good now'
                );
                break;
        }
    }
}

<?php

declare(strict_types=1);

namespace Finderly\OpenapiPhpLib\Model;

trait ArrayableTrait
{
    /**
     * @param array $propertyDefinition
     * @return bool
     */
    public function isPropertyValid(array $propertyDefinition): bool
    {
        if (!isset($propertyDefinition['name']) || !isset($propertyDefinition['type'])) {
            return false;
        }

        return property_exists($this, $propertyDefinition['name']);
    }

    /**
     * @param array $propertyDefinition
     * @return array|null
     */
    protected function getValue(array $propertyDefinition)
    {
        $propertyName = $propertyDefinition['name'];
        if (!$this->isPropertyValid($propertyDefinition)) {
            throw new \DomainException(
                sprintf('The class "%s" property "%s" is invalid', get_class($this), $propertyName)
            );
        }
        if (is_null($this->{$propertyName}) || (is_array($this->{$propertyName}) && empty($this->{$propertyName}))) {
            return null;
        }

        switch ($propertyDefinition['type']) {
            case 'object[k,v]':
                $ret = [];
                foreach ($this->{$propertyName} as $key => $value) {
                    if ($value instanceof ArrayableInterface) {
                        $ret[$key] = $value->toArray();
                    } else {
                        $ret[$key] = $value;
                    }
                }
                return $ret;
                break;
            case 'object':
                return $this->{$propertyName}->toArray();
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
                throw new \DomainException(
                    sprintf('Property type "%s" is unknown', $propertyDefinition['type'])
                );
                break;
        }
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        if (!isset($this->__openApiProperties) || !is_array($this->__openApiProperties)) {
            throw new \DomainException('You can only trait classes that have defined properties');
        }

        $ret = [];
        foreach ($this->__openApiProperties as $propertyDefinition) {
            if (($res = $this->getValue($propertyDefinition)) !== null) {
                $propertyName = $propertyDefinition['openApiName'] ?? $propertyDefinition['name'];

                $ret[$propertyName] = $res;
            }
        }

        return $ret;
    }
}

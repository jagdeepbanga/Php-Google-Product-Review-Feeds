<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Trait;

use JagdeepBanga\GoogleProductReviewFeed\Elements\ChildElementProperty;
use JagdeepBanga\GoogleProductReviewFeed\Elements\ElementProperty;
use Sabre\Xml\Element\Cdata;

trait HasElementProperties
{
    /**
     * Attributes
     *
     * @var ChildElementProperty[]
     */
    private array $elements = [];

    public function setElement(
        string $name,
        string|ElementProperty $value,
        bool $isCData = false,
        array $attributes = []
    ): self {
        $productProperty = new ChildElementProperty($name, $value, $isCData, $attributes);
        $this->elements[strtolower($name)] = $productProperty;

        return $this;
    }

    public function addElement(string $name, string|ElementProperty|Cdata $value, bool $isCData = false): self
    {
        $productProperty = new ChildElementProperty($name, $value, $isCData);
        $attributeName = strtolower($name);
        if (! isset($this->elements[$attributeName])) {
            $this->elements[$attributeName] = [$productProperty];

            return $this;
        }

        if (! is_array($this->elements[$attributeName])) {
            $this->elements[$attributeName] = [$this->elements[$attributeName], $productProperty];

            return $this;
        }

        $this->elements[$attributeName][] = $productProperty;

        return $this;
    }

    public function getPropertiesXmlStructure($namespace): array
    {
        $result = [];

        foreach ($this->elements as $element) {
            $elements = is_array($element) ? $element : [$element];
            foreach ($elements as $data) {
                $result[] = $data->getXmlStructure($namespace);
            }
        }

        return $result;
    }

    /**
     * @return ElementProperty
     */
    public function getPropertyBag()
    {
        $propertyBag = new ElementProperty();
        foreach ($this->elements as $element) {
            $value = $element->isCData() ? new Cdata($element->getValue()) : $element->getValue();
            $propertyBag->addElement($element->getElementName(), $value, $element->isCData());
        }

        return $propertyBag;
    }
}

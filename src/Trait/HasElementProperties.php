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
        int|string|ElementProperty|Cdata $value,
        bool $isCData = false,
        array $attributes = []
    ): self {
        $elementProperty = new ChildElementProperty($name, $value, $isCData, $attributes);
        $this->elements[strtolower($name)] = $elementProperty;

        return $this;
    }

    public function getPropertiesXmlStructure($namespace): array
    {
        $result = [];

        foreach ($this->elements as $element) {
            $result[] = $element->getXmlStructure($namespace);
        }

        return $result;
    }

    public function getPropertyBag(): ElementProperty
    {
        $propertyBag = new ElementProperty();
        foreach ($this->elements as $element) {
            $value = $element->isCData() ? new Cdata($element->getValue()) : $element->getValue();
            $propertyBag->setElement($element->getElementName(), $value, $element->isCData());
        }

        return $propertyBag;
    }
}

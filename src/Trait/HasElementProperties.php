<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Trait;

use Jagdeepbanga\GoogleProductReviewFeed\Elements\ChildElementProperty;
use Jagdeepbanga\GoogleProductReviewFeed\Elements\ElementProperty;
use Sabre\Xml\Element\Cdata;

trait HasElementProperties
{
    /**
     * Attributes
     *
     * @var ChildElementProperty[]
     */
    private array $elements = [];

    /**
     * @param  string  $name
     * @param  int|string|ElementProperty|Cdata  $value
     * @param  bool  $isCData
     * @param  array<string,string>  $attributes
     * @return $this
     */
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

    /**
     * @param  string  $namespace
     * @return array<int, mixed>
     */
    public function getPropertiesXmlStructure(string $namespace): array
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

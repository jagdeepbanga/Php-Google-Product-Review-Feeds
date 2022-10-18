<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Trait;

use Jagdeepbanga\GoogleProductReviewFeed\Elements\ChildElementProperties;
use Jagdeepbanga\GoogleProductReviewFeed\Elements\ParentElementProperties;
use Sabre\Xml\Element\Cdata;

trait HasElementProperties
{
    /**
     * Attributes
     *
     * @var ChildElementProperties[]
     */
    private array $elements = [];

    /**
     * @param  string  $name
     * @param  int|string|ParentElementProperties|Cdata  $value
     * @param  bool  $isCData
     * @param  array<string,string>  $attributes
     * @return $this
     */
    public function setElement(
        string $name,
        int|string|ParentElementProperties|Cdata $value,
        bool $isCData = false,
        array $attributes = []
    ): self {
        $elementProperty = new ChildElementProperties($name, $value, $isCData, $attributes);
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

    public function getPropertyBag(): ParentElementProperties
    {
        $propertyBag = new ParentElementProperties();
        foreach ($this->elements as $element) {
            $value = $element->isCData() ? new Cdata($element->getValue()) : $element->getValue();
            $propertyBag->setElement($element->getElementName(), $value, $element->isCData());
        }

        return $propertyBag;
    }
}

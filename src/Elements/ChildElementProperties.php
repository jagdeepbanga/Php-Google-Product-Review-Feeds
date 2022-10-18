<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Elements;

use Sabre\Xml\Element\Cdata;

class ChildElementProperties
{
    private string $elementName;

    private string|ParentElementProperties|Cdata $value;

    private bool $isCData;

    /**
     * @var array<string,string>
     */
    private array $attributes;

    /**
     * ProductProperty constructor.
     *
     * @param  string  $elementName
     * @param  int|string|ParentElementProperties|Cdata  $value
     * @param  bool  $isCData
     * @param  array<string, string>  $attributes
     */
    public function __construct(
        string $elementName,
        int|string|ParentElementProperties|Cdata $value,
        bool $isCData = false,
        array $attributes = []
    ) {
        $this->elementName = strtolower($elementName);
        $this->value = $value;
        $this->isCData = $isCData;
        $this->attributes = $attributes;
    }

    public function getElementName(): string
    {
        return $this->elementName;
    }

    /**
     * @return string[]|null
     */
    public function getAttributes(): ?array
    {
        if (! empty($this->attributes)) {
            return $this->attributes;
        }

        return null;
    }

    public function getValue(): int|string|ParentElementProperties|Cdata
    {
        return $this->value;
    }

    public function isCData(): bool
    {
        return $this->isCData;
    }

    /**
     * @param  string  $namespace
     * @return array<string, mixed>
     */
    public function getXmlStructure(string $namespace): array
    {
        $value = $this->isCData() && is_string($this->getValue()) ? new Cdata($this->getValue()) : $this->getValue();

        if ($value instanceof ParentElementProperties) {
            $value = $value->getPropertiesXmlStructure($namespace);
        }

        $element = [
            'name' => $this->getElementName(),
            'value' => $value,
        ];

        if ($this->getAttributes()) {
            $element['attributes'] = $this->getAttributes();
        }

        return $element;
    }
}

<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Data;

use Illuminate\Support\Collection;
use Jagdeepbanga\GoogleProductReviewFeed\Data\Collection\CollectionOfElementData;
use Sabre\Xml\Element\Cdata;
use Spatie\DataTransferObject\DataTransferObject;

class ElementData extends DataTransferObject
{
    public string $name;

    public int|string|CollectionOfElementData $value;

    public bool $isCData;

    public ?array $attributes;

    public static function create(
        string $name,
        int|string|CollectionOfElementData $value,
        bool $isCData = false,
        ?array $attributes = []
    ): self {
        return new self([
            'name' => $name,
            'value' => $value,
            'isCData' => $isCData,
            'attributes' => $attributes,
        ]);
    }

    public static function addChild(
        string $name,
        ElementData|Collection $childElement,
        bool $isCData = false,
        array $attributes = []
    ): self {
        if ($childElement instanceof ElementData) {
            $childElement = collect([$childElement]);
        }

        $elementCollection = ElementDataCollection::create($childElement);

        return self::create($name, $elementCollection->elements, $isCData, $attributes);
    }

    public function toArray(): array
    {
        if ($this->value instanceof CollectionOfElementData) {
            return [
                'name' => $this->name,
                'value' => $this->value->toArray(),
                'attributes' => $this->attributes,
            ];
        }

        return [
            'name' => $this->name,
            'value' => $this->isCData ? new Cdata($this->value) : $this->value,
            'attributes' => $this->attributes,
        ];
    }
}

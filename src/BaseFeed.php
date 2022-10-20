<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

abstract class BaseFeed
{
    protected Collection $elements;

    public ?string $rootElementName = null;

    public function __construct()
    {
        $this->elements = collect();
    }

    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function toArray(): array
    {
        $elements = $this->elements->map(function (ElementData $element) {
            return $element->toArray();
        })->toArray();

        return [
            $this->getRootElementName() => $elements,
        ];
    }

    public function getRootElementName(): string
    {
        if ($this->rootElementName) {
            return $this->rootElementName;
        }

        return Str::of(get_called_class())
            ->afterLast('\\')
            ->replaceLast('Feed', '')
            ->lower()
            ->toString();
    }
}

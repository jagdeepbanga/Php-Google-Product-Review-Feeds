<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Data\Collection;

use Illuminate\Support\Collection;
use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

class CollectionOfElementData extends Collection
{
    public function offsetGet($key): ElementData
    {
        return parent::offsetGet($key);
    }

    public function toArray(): array
    {
        return $this->collect()->map(function (ElementData $element) {
            return $element->toArray();
        })->toArray();
    }
}

<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Data;

use Illuminate\Support\Collection;
use Jagdeepbanga\GoogleProductReviewFeed\Data\Casters\ElementDataCollectionCaster;
use Jagdeepbanga\GoogleProductReviewFeed\Data\Collection\CollectionOfElementData;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ElementDataCollection extends DataTransferObject
{
    #[CastWith(ElementDataCollectionCaster::class)]
    public CollectionOfElementData $elements;

    public static function create(Collection $elements): self
    {
        return new self([
            'elements' => $elements,
        ]);
    }
}

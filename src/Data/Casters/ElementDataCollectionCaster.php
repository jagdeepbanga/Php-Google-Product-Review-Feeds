<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Data\Casters;

use Jagdeepbanga\GoogleProductReviewFeed\Data\Collection\CollectionOfElementData;
use Spatie\DataTransferObject\Caster;

class ElementDataCollectionCaster implements Caster
{
    public function cast(mixed $value): CollectionOfElementData
    {
        return CollectionOfElementData::make(
            collect($value)->values()
        );
    }
}

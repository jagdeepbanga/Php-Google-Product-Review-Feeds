<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

class ReviewerFeed extends BaseFeed
{
    public function setName(string $name): self
    {
        $this->elements->push(ElementData::create('name', $name));

        return $this;
    }

    public function setId(string $id): self
    {
        $this->elements->push(ElementData::create('reviewer_id', $id));

        return $this;
    }
}

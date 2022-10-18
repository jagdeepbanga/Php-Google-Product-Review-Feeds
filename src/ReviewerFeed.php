<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ReviewerFeed
{
    use HasElementProperties;

    public function setName(string $name): self
    {
        $this->setElement('name', $name, true);

        return $this;
    }

    public function setId(string $id): self
    {
        $this->setElement('reviewer_id', $id);

        return $this;
    }
}

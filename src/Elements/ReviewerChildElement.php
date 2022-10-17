<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Elements;

use JagdeepBanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ReviewerChildElement
{
    use HasElementProperties;

    public function setName(string $name): self
    {
        $this->setElement('name', $name);

        return $this;
    }

    public function setReviewerId(string $id): self
    {
        $this->setElement('reviewer_id', $id);

        return $this;
    }
}

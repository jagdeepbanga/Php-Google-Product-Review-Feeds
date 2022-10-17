<?php

namespace JagdeepBanga\GoogleProductReviewFeed;

use JagdeepBanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class Reviewer
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

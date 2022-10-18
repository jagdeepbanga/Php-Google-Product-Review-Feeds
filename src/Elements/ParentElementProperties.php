<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Elements;

use Jagdeepbanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ParentElementProperties
{
    use HasElementProperties;

    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     * @return ParentElementProperties
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}

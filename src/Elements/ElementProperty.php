<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Elements;

use JagdeepBanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ElementProperty
{
    use HasElementProperties;

    /**
     * Property name
     *
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ElementProperty
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

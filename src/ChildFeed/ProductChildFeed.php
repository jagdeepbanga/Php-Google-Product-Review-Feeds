<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\ChildFeed;

use Jagdeepbanga\GoogleProductReviewFeed\BaseFeed;
use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

class ProductChildFeed extends BaseFeed
{
    public function setGtin(string $gtin): self
    {
        $childElement = ElementData::create('gtin', $gtin);

        $this->elements->push(ElementData::addChild('gtins', $childElement));

        return $this;
    }

    public function setSku(string $sku): self
    {
        $childElement = ElementData::create('sku', $sku, true);

        $this->elements->push(ElementData::addChild('skus', $childElement));

        return $this;
    }

    public function setBrand(string $brand): self
    {
        $childElement = ElementData::create('brand', $brand, true);

        $this->elements->push(ElementData::addChild('brands', $childElement));

        return $this;
    }
}

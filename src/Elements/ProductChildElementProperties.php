<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Elements;

use Jagdeepbanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ProductChildElementProperties
{
    use HasElementProperties;

    public function setGtin(string $gtin): self
    {
        $propertyBag = (new ParentElementProperties())->setElement('gtin', $gtin)->setName('gtins');
        $this->setElement('gtins', $propertyBag);

        return $this;
    }

    public function setSku(string $sku): self
    {
        $propertyBag = (new ParentElementProperties())->setElement('sku', $sku, true)->setName('skus');
        $this->setElement('skus', $propertyBag);

        return $this;
    }

    public function setBrand(string $brand): self
    {
        $propertyBag = (new ParentElementProperties())->setElement('brand', $brand, true)->setName('brands');
        $this->setElement('brands', $propertyBag);

        return $this;
    }
}

<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Elements;

use JagdeepBanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ProductChildElement
{
    use HasElementProperties;

    public function setGtin(string $gtin): self
    {
        $propertyBag = (new ElementProperty())->setElement('gtin', $gtin)->setName('gtins');
        $this->setElement('gtins', $propertyBag);

        return $this;
    }

    public function setSku(string $sku): self
    {
        $propertyBag = (new ElementProperty())->setElement('sku', $sku, true)->setName('skus');
        $this->setElement('skus', $propertyBag);

        return $this;
    }

    public function setBrand(string $brand): self
    {
        $propertyBag = (new ElementProperty())->setElement('brand', $brand, true)->setName('brands');
        $this->setElement('brands', $propertyBag);

        return $this;
    }
}

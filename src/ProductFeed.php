<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Elements\ProductChildElementProperties;
use Jagdeepbanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ProductFeed
{
    use HasElementProperties;

    private ProductChildElementProperties $productIdsBag;

    public function __construct()
    {
        $this->productIdsBag = new ProductChildElementProperties();
    }

    public function setName(string $name): self
    {
        $this->setElement('product_name', $name, true);

        return $this;
    }

    public function setGtin(string $gtin): self
    {
        $this->productIdsBag->setGtin($gtin);
        $propertyBag = $this->productIdsBag->getPropertyBag()->setName('product_ids');
        $this->setElement('product_ids', $propertyBag);

        return $this;
    }

    public function setSku(string $sku): self
    {
        $this->productIdsBag->setSku($sku);
        $propertyBag = $this->productIdsBag->getPropertyBag()->setName('product_ids');
        $this->setElement('product_ids', $propertyBag);

        return $this;
    }

    public function setBrand(string $brand): self
    {
        $this->productIdsBag->setBrand($brand);
        $propertyBag = $this->productIdsBag->getPropertyBag()->setName('product_ids');
        $this->setElement('product_ids', $propertyBag);

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->setElement('product_url', $url);

        return $this;
    }
}

<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Illuminate\Support\Collection;
use Jagdeepbanga\GoogleProductReviewFeed\ChildFeed\ProductChildFeed;
use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

class ProductFeed extends BaseFeed
{
    private ProductChildFeed $productIdsChild;

    public function __construct()
    {
        $this->productIdsChild = new ProductChildFeed();

        parent::__construct();
    }

    public function setName(string $name): self
    {
        $this->elements->push(ElementData::create('product_name', $name, true));

        return $this;
    }

    public function setGtin(string $gtin): self
    {
        $this->productIdsChild->setGtin($gtin);

        return $this;
    }

    public function setSku(string $sku): self
    {
        $this->productIdsChild->setSku($sku);

        return $this;
    }

    public function setBrand(string $brand): self
    {
        $this->productIdsChild->setBrand($brand);

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->elements->push(ElementData::create('product_url', $url));

        return $this;
    }

    private function setProductIdsChild(): self
    {
        $this->elements->push(ElementData::addChild('product_ids', $this->productIdsChild->getElements()));

        return $this;
    }

    public function getElements(): Collection
    {
        $this->setProductIdsChild();

        return $this->elements;
    }
}

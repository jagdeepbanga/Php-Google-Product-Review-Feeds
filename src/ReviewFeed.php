<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;

class ReviewFeed extends BaseFeed
{
    public function setId(int $id): self
    {
        $this->elements->push(ElementData::create('review_id', $id));

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->elements->push(ElementData::create('title', $title));

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->elements->push(ElementData::create('review_url', $url, false, ['type' => 'singleton']));

        return $this;
    }

    public function setRating(int $rating): self
    {
        $childElement = ElementData::create('overall', $rating, false, ['min' => '1', 'max' => '5']);

        $this->elements->push(ElementData::addChild('ratings', $childElement));

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->elements->push(ElementData::create('content', $content, true));

        return $this;
    }

    public function setTimeStamp(string $timeStamp): self
    {
        $this->elements->push(ElementData::create('review_timestamp', $timeStamp));

        return $this;
    }

    public function addProduct(ProductFeed $product): self
    {
        $childElement = ElementData::addChild('product', $product->getElements());

        $this->elements->push(ElementData::addChild('products', $childElement));

        return $this;
    }

    public function addReviewer(ReviewerFeed $reviewer): self
    {
        $this->elements->push(ElementData::addChild('reviewer', $reviewer->getElements()));

        return $this;
    }
}

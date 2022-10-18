<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Elements\ParentElementProperties;
use Jagdeepbanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class ReviewFeed
{
    use HasElementProperties;

    public function setId(int $id): self
    {
        $this->setElement('review_id', $id);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->setElement('title', $title);

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->setElement('review_url', $url, false, ['type' => 'singleton']);

        return $this;
    }

    public function setRating(int $rating): self
    {
        $propertyBag = (new ParentElementProperties())->setElement('overall', $rating, false, [
            'min' => '1',
            'max' => '5',
        ])->setName('ratings');
        $this->setElement('ratings', $propertyBag);

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->setElement('content', $content, true);

        return $this;
    }

    public function setTimeStamp(string $timeStamp): self
    {
        $this->setElement('review_timestamp', $timeStamp);

        return $this;
    }

    public function addProduct(ProductFeed $product): self
    {
        $propertyBag = (new ParentElementProperties())->setElement('product', $product->getPropertyBag())->setName('products');
        $this->setElement('products', $propertyBag);

        return $this;
    }

    public function addReviewer(ReviewerFeed $reviewer): self
    {
        $this->setElement('reviewer', $reviewer->getPropertyBag());

        return $this;
    }

    /**
     * @param  string  $namespace
     * @return array<string, mixed>
     */
    public function getXmlStructure(string $namespace): array
    {
        return [
            'review' => $this->getPropertiesXmlStructure($namespace),
        ];
    }
}

<?php

namespace JagdeepBanga\GoogleProductReviewFeed;

use JagdeepBanga\GoogleProductReviewFeed\Elements\ElementProperty;
use JagdeepBanga\GoogleProductReviewFeed\Elements\ReviewerChildElement;
use JagdeepBanga\GoogleProductReviewFeed\Trait\HasElementProperties;

class Review
{
    use HasElementProperties;

    private ReviewerChildElement $reviewer;

    public function __construct()
    {
        $this->reviewer = new ReviewerChildElement();
    }

    public function setName(string $name): self
    {
        $this->reviewer->setElement('name', $name, true);
        $propertyBag = $this->reviewer->getPropertyBag()->setName('reviewer');
        $this->setElement('reviewer', $propertyBag);

        return $this;
    }

    public function setId(int $id): self
    {
        $this->reviewer->setElement('reviewer_id', $id);
        $propertyBag = $this->reviewer->getPropertyBag()->setName('reviewer');
        $this->setElement('reviewer', $propertyBag);
        $this->setElement('review_id', $id);

        return $this;
    }

    public function setTimeStamp(string $timeStamp): self
    {
        $this->setElement('review_timestamp', $timeStamp);

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
        $propertyBag = (new ElementProperty())->setElement('overall', $rating, false, [
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

    public function addProduct(Product $product): self
    {
        $propertyBag = (new ElementProperty())->setElement('product', $product->getPropertyBag())->setName('products');
        $this->setElement('products', $propertyBag);

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

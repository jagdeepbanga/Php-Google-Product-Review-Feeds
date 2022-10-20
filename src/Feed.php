<?php

namespace Jagdeepbanga\GoogleProductReviewFeed;

use Jagdeepbanga\GoogleProductReviewFeed\Services\XmlElement;
use Jagdeepbanga\GoogleProductReviewFeed\Services\XmlService;

class Feed
{
    public string $rootElementName = 'feed';

    private string $publisherName;

    private string $publisherFavIcon;

    private array $elements;

    public function __construct(string $publisherName, string $publisherFavIcon)
    {
        $this->publisherName = $publisherName;
        $this->publisherFavIcon = $publisherFavIcon;
        $this->elements = $this->baseXmlStructure();
    }

    public function generate(): string
    {
        $service = new XmlService();
        $service->namespaceMap = $this->getNameSpaceMap();

        return $service->write($this->rootElementName, new XmlElement($this->elements));
    }

    private function baseXmlStructure(): array
    {
        return [
            'version' => '2.3',
            'aggregator' => [
                'name' => 'name',
                'value' => 'Product Review Feed',
            ],
            'publisher' => [
                [
                    'name' => 'name',
                    'value' => $this->publisherName,
                ],
                [
                    'name' => 'favicon',
                    'value' => $this->publisherFavIcon,
                ],
            ],
        ];
    }

    private function getNameSpaceMap(): array
    {
        return [
            'http://www.w3.org/2007/XMLSchema-versioning' => 'vc',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
            'http://www.google.com/shopping/reviews/schema/product/2.3/product_reviews.xsd' => 'noNamespaceSchemaLocation',
        ];
    }

    public function addReview(BaseFeed $review): self
    {
        $this->elements['reviews'][] = $review->toArray();

        return $this;
    }
}

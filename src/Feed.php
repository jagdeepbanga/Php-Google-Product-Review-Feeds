<?php

namespace JagdeepBanga\GoogleProductReviewFeed;

use JagdeepBanga\GoogleProductReviewFeed\Services\XmlElement;
use JagdeepBanga\GoogleProductReviewFeed\Services\XmlService;

class Feed
{
    private string $publisherName;

    private string $publisherFavIcon;

    private array $entries;

    public function __construct(string $publisherName, string $publisherFavIcon)
    {
        $this->publisherName = $publisherName;
        $this->publisherFavIcon = $publisherFavIcon;
    }

    public function generate(): string
    {
        $service = new XmlService();
        $service->namespaceMap = [
            'http://www.w3.org/2007/XMLSchema-versioning' => 'vc',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
            'http://www.google.com/shopping/reviews/schema/product/2.3/product_reviews.xsd' => 'noNamespaceSchemaLocation',
        ];

        $xmlStructure = $this->baseXmlStructure();

        foreach ($this->entries as $entry) {
            $xmlStructure['reviews'][] = $entry->getXmlStructure('');
        }

        return $service->write('feed', new XmlElement($xmlStructure));
    }

    /**
     * @return array<string, mixed>
     */
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
                ]
            ],
            'reviews' => [],
        ];
    }

    public function addReview(Review $review): self
    {
        $this->entries[] = $review;

        return $this;
    }
}

<?php

namespace JagdeepBanga\GoogleProductReviewFeed;

use JagdeepBanga\GoogleProductReviewFeed\Services\XmlElement;
use JagdeepBanga\GoogleProductReviewFeed\Services\XmlService;

class Feed
{
    private string $publisherName;

    private string $publisherFavIcon;

    public function __construct(string $publisherName, string $publisherFavIcon)
    {
        $this->publisherName = $publisherName;
        $this->publisherFavIcon = $publisherFavIcon;
    }

    public function generate()
    {
        $service = new XmlService();
        $service->namespaceMap = [
            'http://www.w3.org/2007/XMLSchema-versioning' => 'vc',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
            'http://www.google.com/shopping/reviews/schema/product/2.3/product_reviews.xsd' => 'noNamespaceSchemaLocation',
        ];

        $xmlStructure = $this->baseXmlStructure();

        return $service->write('feed', new XmlElement($xmlStructure));
    }

    private function baseXmlStructure(): array
    {
        return [
            'version' => '2.3',
            'aggregator' => [
                ['name_temp' => 'Product Review Feed'],
            ],
            'publisher' => [
                ['name_temp' => $this->publisherName],
                ['favicon' => $this->publisherFavIcon],
            ],
            'reviews' => [],
        ];
    }
}

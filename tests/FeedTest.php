<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Tests;

use Jagdeepbanga\GoogleProductReviewFeed\Feed;
use Jagdeepbanga\GoogleProductReviewFeed\Tests\Fixture\FeedFixture;

class FeedTest extends TestCase
{
    /** @test */
    public function can_generate_feed(): void
    {
        $expectedFeed = FeedFixture::getDefaultExpectedXml();

        $feed = new Feed('Company Name', 'https://www.example.com/favicon.ico');

        $this->assertXmlStringEqualsXmlString($expectedFeed, $feed->generate());
    }
}

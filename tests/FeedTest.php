<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Tests;

use JagdeepBanga\GoogleProductReviewFeed\Feed;
use JagdeepBanga\GoogleProductReviewFeed\Tests\Fixture\FeedFixture;

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

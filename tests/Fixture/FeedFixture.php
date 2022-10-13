<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Tests\Fixture;

class FeedFixture
{
    public static function getDefaultExpectedXml(): string
    {
        $path = sprintf('%s/Stub/DefaultFeed.xml', dirname(__FILE__, 2));

        return file_get_contents($path);
    }
}

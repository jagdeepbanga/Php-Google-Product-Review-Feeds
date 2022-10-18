<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Tests\Fixture;

class FeedFixture
{
    public static function getDefaultExpectedXml(): string
    {
        $path = sprintf('%s/Stub/DefaultFeed.xml', dirname(__FILE__, 2));

        return file_get_contents($path);
    }

    public static function getReviewExpectedXml(): string
    {
        $path = sprintf('%s/Stub/ReviewXmlFeed.xml', dirname(__FILE__, 2));

        return file_get_contents($path);
    }
}

<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Tests\Unit;

use Jagdeepbanga\GoogleProductReviewFeed\Elements\ChildElementProperty;
use Jagdeepbanga\GoogleProductReviewFeed\Tests\TestCase;

class ChildElementPropertyTest extends TestCase
{
    /** @test */
    public function can_generate_xml_data_array(): void
    {
        $properties = new ChildElementProperty('xml_key', 'value');

        $payload = $properties->getXmlStructure('');

        $this->assertEquals([
            'name' => 'xml_key',
            'value' => 'value',
        ], $payload);
    }
}

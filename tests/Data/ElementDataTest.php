<?php

namespace Jagdeepbanga\GoogleProductReviewFeed\Tests\Data;

use Jagdeepbanga\GoogleProductReviewFeed\Data\ElementData;
use Jagdeepbanga\GoogleProductReviewFeed\Tests\TestCase;
use Sabre\Xml\Element\Cdata;

class ElementDataTest extends TestCase
{
    /** @test */
    public function can_create_element_data(): void
    {
        $elementData = ElementData::create('content', 'This is a content', true, ['attribute' => 'value'])
            ->toArray();

        $this->assertEquals('content', $elementData['name']);
        $this->assertInstanceOf(Cdata::class, $elementData['value']);
        $this->assertEquals(['attribute' => 'value'], $elementData['attributes']);
    }
}

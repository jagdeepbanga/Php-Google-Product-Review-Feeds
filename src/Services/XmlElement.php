<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Services;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class XmlElement implements XmlSerializable
{
    /**
     * @var array
     */
    private $value;

    /**
     * RssElement constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function xmlSerialize(Writer $writer): void
    {
        $writer->write($this->value);
    }
}

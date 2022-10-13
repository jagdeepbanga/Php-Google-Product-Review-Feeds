<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Services;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class XmlElement implements XmlSerializable
{
    /**
     * @var array<mixed>
     */
    private array $value;

    /**
     * @param  array<mixed>  $value
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function xmlSerialize(Writer $writer): void
    {
        $writer->write($this->value);
    }
}

<?php

namespace JagdeepBanga\GoogleProductReviewFeed\Services;

use Sabre\Xml\Service;
use Sabre\Xml\XmlSerializable;

class XmlService extends Service
{
    /**
     * Generates an XML document in one go.
     *
     * The $rootElement must be specified in clark notation.
     * The value must be a string, an array or an object implementing
     * XmlSerializable. Basically, anything that's supported by the Writer
     * object.
     *
     * $contextUri can be used to specify a sort of 'root' of the PHP application,
     * in case the xml document is used as a http response.
     *
     * This allows an implementor to easily create URI's relative to the root
     * of the domain.
     *
     * @param  string|array<string, mixed>|object|XmlSerializable  $value
     */
    public function write(string $rootElementName, $value, string $contextUri = null): string
    {
        $w = $this->getWriter();
        $w->openMemory();
        $w->contextUri = $contextUri;
        $w->setIndent(true);
        $w->startDocument('1.0', 'UTF-8');
        $w->writeElement($rootElementName, $value);

        return $w->outputMemory();
    }
}

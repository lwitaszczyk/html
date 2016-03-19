<?php

namespace Html;

class Span extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('span', $content);
    }
}

<?php

namespace Html;

class Label extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('label', $content);
    }
}

<?php

namespace Html;

class H3 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h3', $content);
    }
}

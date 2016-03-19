<?php

namespace Html;

class H1 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h1', $content);
    }
}

<?php

namespace Html;

class H6 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h6', $content);
    }
}

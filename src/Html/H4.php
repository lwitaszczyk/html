<?php

namespace Html;

class H4 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h4', $content);
    }
}

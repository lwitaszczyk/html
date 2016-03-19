<?php

namespace Html;

class H2 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h2', $content);
    }
}

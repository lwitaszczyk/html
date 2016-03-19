<?php

namespace Html;

class P extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('p', $content);
    }
}

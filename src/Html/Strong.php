<?php

namespace Html;

class Strong extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('strong', $content);
    }
}

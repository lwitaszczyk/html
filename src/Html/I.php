<?php

namespace Html;

class I extends Tag
{
    /**
     * @param string|null $content
     */
    public function __construct($content = null)
    {
        parent::__construct('i', $content);
    }
}

<?php

namespace Html;

class Meta extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('meta', $content, true);
    }
}

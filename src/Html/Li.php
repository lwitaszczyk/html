<?php

namespace Html;

class Li extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('li', $content);
    }
}

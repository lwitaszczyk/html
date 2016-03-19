<?php

namespace Html5;

use Html\Tag;

class Header extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('header', $content);
    }
}

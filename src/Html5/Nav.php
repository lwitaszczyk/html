<?php

namespace Html5;

use Html\Tag;

class Nav extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('nav', $content);
    }
}

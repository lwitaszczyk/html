<?php

namespace Html5;

use Html\Tag;

class Footer extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('footer', $content);
    }
}

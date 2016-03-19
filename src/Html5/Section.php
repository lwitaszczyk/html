<?php

namespace Html5;

use Html\Tag;

class Section extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('section', $content);
    }
}

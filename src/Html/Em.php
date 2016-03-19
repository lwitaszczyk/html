<?php

namespace Html;

class Em extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('em', $content);
    }
}

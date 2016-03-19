<?php

namespace Html;

class Div extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('div', $content);
    }
}

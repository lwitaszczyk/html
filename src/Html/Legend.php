<?php

namespace Html;

class Legend extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('legend', $content);
    }
}

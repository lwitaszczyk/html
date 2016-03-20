<?php

namespace Html;

class H5 extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('h5', $content);
    }
}

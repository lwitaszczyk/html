<?php

namespace Html;

class Plain extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content)
    {
        parent::__construct(null, $content);
    }
}

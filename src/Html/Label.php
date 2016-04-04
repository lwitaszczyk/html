<?php

namespace Html;

class Label extends Tag
{
    /**
     * @var Control
     */
    private $control;

    /**
     * @param string $content
     */
    public function __construct($content = '')
    {
        parent::__construct('label', $content);
    }
}

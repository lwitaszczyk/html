<?php

namespace Html\Input;

use Html\Input;

class Text extends Input
{
    /**
     * @param string $name
     * @param mixed $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct(self::T_TEXT, $name, $value);
    }
}

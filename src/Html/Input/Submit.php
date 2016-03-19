<?php

namespace Html\Input;

use Html\Input;

class Submit extends Input
{
    /**
     * @param string $name
     * @param mixed $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct(self::T_SUBMIT, $name, $value);
        $this->addClass('submit');
    }
}

<?php

namespace Html5\Input;

use Html\Input;

class Telephone extends Input
{
    /**
     * @param string $name
     * @param mixed $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct('tel', $name, $value);
    }
}

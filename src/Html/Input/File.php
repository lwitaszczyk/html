<?php

namespace Html\Input;

use Html\Input;

class File extends Input
{
    /**
     * @param string $name
     * @param mixed $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct(self::T_FILE, $name, $value);
    }
}

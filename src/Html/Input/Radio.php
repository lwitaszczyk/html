<?php

namespace Html\Input;

use Html\Input;

class Radio extends Input
{
    /**
     * @param string $name
     * @param string $value
     * @param bool $checked
     */
    public function __construct($name = null, $value = null, $checked = false)
    {
        parent::__construct(self::T_RADIO, $name, $value, $checked);
        $this->addClass('radio');
    }

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        parent::build();
    }
}

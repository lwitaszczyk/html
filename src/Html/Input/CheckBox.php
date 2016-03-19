<?php

namespace Html\Input;

use Html\Input;

class CheckBox extends Input
{
    /**
     * @param string $name
     * @param bool $value
     */
    public function __construct($name = null, $value = false)
    {
        parent::__construct(self::T_CHECKBOX, $name, $value);
        $this->addClass('checkbox');
    }

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        $this->setAttribute('checked', 'checked', $this->getValue());
        parent::build();
    }
}

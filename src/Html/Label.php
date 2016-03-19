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

    /**
     * @param Control $control
     * @return $this
     */
    public function setControl(Control $control = null)
    {
        $this->control = $control;
        return $this;
    }

    /**
     */
    public function build()
    {
        if (!is_null($this->control)) {
            $for = $this->control->getId();
            $this->control->setId($for);
            $this->setAttribute('for', $for);
        }
        parent::build();
    }
}

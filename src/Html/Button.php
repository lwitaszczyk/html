<?php

namespace Html;

class Button extends Tag
{
    const T_SUBMIT = 'submit';
    const T_RESET = 'reset';
    const T_BUTTON = 'button';

    /**
     * @var string
     */
    private $type = self::T_SUBMIT;

    /**
     * @param string $caption
     * @param string $type
     */
    public function __construct($caption = null, $type = self::T_SUBMIT)
    {
        parent::__construct('button');
        $this->type = $type;
        $this->setContent($caption);
    }

    /**
     * @param string $type
     */
    public function setType($type = self::T_SUBMIT)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('type', $this->getType());

        return parent::render();
    }
}

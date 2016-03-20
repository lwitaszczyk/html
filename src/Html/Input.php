<?php

namespace Html;

abstract class Input extends Control
{
    const T_TEXT = 'text';
    const T_PASSWORD = 'password';
    const T_RADIO = 'radio';
    const T_CHECKBOX = 'checkbox';
    const T_NUMBER = 'number';
    const T_DATETIME = 'datetime';
    const T_EMAIL = 'mail';
    const T_SUBMIT = 'submit';
    const T_IMAGE = 'image';
    const T_FILE = 'file';
    const T_HIDDEN = 'hidden';

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     * @param string $name
     * @param mixed  $value
     * @param bool $checked
     */
    public function __construct($type = self::T_TEXT, $name = null, $value = null, $checked = false)
    {
        parent::__construct('input', $name, $value, $checked);
        $this->setShortClosed(true);
        $this->setType($type);
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $this->setAttribute('type', $this->getType());
        $this->setAttribute('name', $this->getName());
        $this->setAttribute('value', $this->getValue());
        parent::build();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}

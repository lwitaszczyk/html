<?php

namespace Html;

class Option extends Tag
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $selected;

    /**
     * @param string $content
     * @param string $value
     */
    public function __construct($content, $value = null, $selected = false)
    {
        parent::__construct('option', $content);
        $this->value = $value;
        $this->selected = $selected;
    }

    /**
     * @param string $label
     * @return self
     */
    public function setLabel($label)
    {
        $this->setContent($label);
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->getContent();
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param bool $selected
     * @return self
     */
    public function setSelected($selected)
    {
        $this->selected = (bool) $selected;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSelected()
    {
        return $this->selected;
    }

    /**
     * @return string
     */
    public function build()
    {
        parent::build();
        $this->setAttribute('value', $this->getValue());
        $this->setAttribute('selected', 'selected', $this->isSelected());
    }
}

<?php

namespace Html;

class OptGroup extends Tag
{
    /**
     * @var string
     */
    private $label;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        parent::__construct('optgroup', $content, true);
        $this->setLabel($content);
    }

    /**
     * @param string $label
     *
     * @return self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('label', $this->getLabel());

        return parent::render();
    }
}

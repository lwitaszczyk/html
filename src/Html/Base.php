<?php

namespace Html;

class Base extends Tag
{
    /**
     * @var string
     */
    private $href = null;

    /**
     * @param string $href
     */
    public function __construct($href = null)
    {
        parent::__construct('base');
        $this->setHref($href);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     *
     * @return self
     */
    public function setHref($href = null)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('href', $this->getHref());
        return parent::render();
    }
}

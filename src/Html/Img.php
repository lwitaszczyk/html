<?php

namespace Html;

class Img extends Tag
{
    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $alt;

    /**
     * @param string $src
     * @param string $alt
     */
    public function __construct($src = null, $alt = null)
    {
        parent::__construct('img', '', true);
        $this->setSrc($src);
        $this->setAlt($alt);
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $src
     *
     * @return Img
     */
    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     *
     * @return Img
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('src', $this->getSrc());
        $this->setAttribute('alt', $this->getAlt());
        return parent::render();
    }
}

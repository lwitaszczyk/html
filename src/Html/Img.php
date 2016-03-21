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
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @param string $src
     * @param string $alt
     * @param int $width
     * @param int $height
     */
    public function __construct($src = null, $alt = null, $width = null, $height = null)
    {
        parent::__construct('img', '', true);
        $this->setSrc($src);
        $this->setAlt($alt);
        $this->setWidth($width);
        $this->setHeight($height);
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
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return Img
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return Img
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('src', $this->getSrc());
        $this->setAttribute('alt', $this->getAlt());
        $this->setAttribute('width', $this->getWidth());
        $this->setAttribute('height', $this->getHeight());
        return parent::render();
    }
}

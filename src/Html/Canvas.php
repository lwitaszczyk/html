<?php

namespace Html;

class Canvas extends Tag
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @param int $width
     * @param int $height
     */
    public function __construct($width = null, $height = null)
    {
        parent::__construct('canvas');
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = (int)$width;
        return $this;
    }

    /**
     * @param int $height
     *
     * @return \Html\Audio
     */
    public function setHeight($height)
    {
        $this->height = (int)$height;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $this->setAttribute('width', $this->width);
        $this->setAttribute('height', $this->height);

        return parent::render();
    }
}

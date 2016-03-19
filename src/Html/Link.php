<?php

namespace Html;

class Link extends Tag
{
    /**
     * @var string
     */
    private $rel;

    /**
     * @var string
     */
    private $href;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $media;

    /**
     * @param string $rel
     * @param string $href
     * @param string $type
     * @param string $media
     */
    public function __construct($rel = null, $href = null, $type = null, $media = null)
    {
        parent::__construct('link', '', true);
        $this->setRel($rel);
        $this->setHref($href);
        $this->setType($type);
        $this->setMedia($media);
    }

    /**
     * @param string $rel
     *
     * @return self
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * @param string $href
     *
     * @return self
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $media
     *
     * @return self
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('href', $this->getHref());
        $this->setAttribute('rel', $this->getRel());
        $this->setAttribute('type', $this->getType());
        $this->setAttribute('media', $this->getMedia());

        return parent::render();
    }
}

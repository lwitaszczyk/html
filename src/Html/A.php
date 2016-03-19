<?php

namespace Html;

class A extends Tag
{
    const REL_NOFOLLOW = 'nofollow';
    const REL_NOREFERRER = 'noreferrer';

    /**
     * @var string
     */
    private $rel;

    /**
     * @var string
     */
    private $href;

    /**
     * @var bool
     */
    private $blank;

    /**
     * @param string $href
     * @param string $caption
     * @param bool $blank
     */
    public function __construct($href = null, $caption = null, $blank = false)
    {
        parent::__construct('a', $caption);
        $this->setHref($href);
        $this->setBlank($blank);
        $this->rel = null;
    }

    /**
     * @param string $href
     *
     * @return self
     */
    public function setHref($href = null)
    {
        $this->href = (string)$href;
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
     * @param string $caption
     *
     * @return self
     */
    public function setCaption($caption)
    {
        $this->setContent($caption);
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->getContent();
    }

    /**
     * @param bool $blank
     *
     * @return self
     */
    public function setBlank($blank = false)
    {
        $this->blank = (bool) $blank;
        return $this;
    }

    /**
     * @return bool
     */
    public function getBlank()
    {
        return $this->blank;
    }

    /**
     * @param bool|false $rel
     * @return $this
     */
    public function setRel($rel = false)
    {
        $this->rel = (bool)$rel;
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
     * {@inheritDoc}
     */
    public function build()
    {
        $this->setAttribute('href', $this->getHref());
        $this->setAttribute('target', '_blank', $this->getBlank());
        $this->setAttribute('rel', $this->getRel(), $this->getRel());
        return parent::build();
    }
}

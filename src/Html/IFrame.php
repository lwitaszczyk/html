<?php

namespace Html;

class IFrame extends Tag
{

    private $src;

    /**
     * IFrame constructor.
     * @param string $src
     */
    public function __construct($src = null)
    {
        parent::__construct('iframe');
        $this->src = $src;
    }

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        $this->setAttribute('src', $this->getSrc());
        return parent::build();
    }

    /**
     * @return null|string
     */
    public function getSrc()
    {
        return $this->src;
    }
}

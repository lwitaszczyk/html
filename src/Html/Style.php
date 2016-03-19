<?php

namespace Html;

class Style extends Link
{

    /**
     * @param string $href
     */
    public function __construct($href = null)
    {
        parent::__construct('stylesheet', $href, 'text/css');
    }

    /**
     * @return string
     */
    public function render()
    {
        if ($this->getContent() !== '') {
            $this->setTag('style');
            $this->setShortClosed(false);
            return (new Tag('style', $this->getContent()))->setAttribute('type', $this->getType())->render();
        } else {
            return parent::render();
        }
    }
}

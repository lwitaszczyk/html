<?php

namespace Html;

class Td extends Tag
{
    /**
     * @var int
     */
    private $colspan;

    /**
     * @var int
     */
    private $rowspan;

    /**
     * @param string $content
     */
    public function __construct($content = null)
    {
        parent::__construct('td', $content);
        $this->colspan = null;
        $this->rowspan = null;
    }

    /**
     * @param int $colspan
     *
     * @return self
     */
    public function setColspan($colspan = null)
    {
        $this->colspan = (int)$colspan;
        return $this;
    }

    /**
     * @param int $rowspan
     *
     * @return self
     */
    public function setRowspan($rowspan = null)
    {
        $this->rowspan = (int)$rowspan;
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('colspan', $this->colspan);
        $this->setAttribute('rowspan', $this->rowspan);

        return parent::render();
    }
}

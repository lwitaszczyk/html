<?php

namespace Html;

class TextArea extends Control
{
    /**
     * @var int
     */
    private $cols;

    /**
     * @var int
     */
    private $rows;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct('textarea', $name, $value);
    }

    /**
     * @param int $cols
     * @param int $rows
     */
    public function setColsAndRows($cols = null, $rows = null)
    {
        $this->cols = (int)$cols;
        $this->rows = (int)$rows;
    }

    /**
     * @return string
     */
    public function render()
    {
        $value = $this->getValue();
        $this->setContent($value);
        $this->setAttribute('cols', $this->cols);
        $this->setAttribute('rows', $this->rows);

        return parent::render();
    }
}

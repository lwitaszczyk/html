<?php

namespace Html;

class FieldSet extends Tag
{
    /**
     * @var string
     */
    private $legend = null;

    /**
     * @param string $legend
     */
    public function __construct($legend = null)
    {
        parent::__construct('fieldset');
        $this->legend = $legend;
        if (!is_null($this->legend)) {
            $this->add([
                new Legend($this->legend),
            ]);
        }
    }
}

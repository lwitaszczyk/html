<?php

namespace Mustache;

use Html\Tag;
use Mustache_Engine;

class Mustache extends Tag
{

    /**
     * @var string
     */
    private $template;

    /**
     * @var array
     */
    private $context;

    /**
     * Mustache constructor.
     * @param string $template
     * @param array $context
     */
    public function __construct($template, array $context = [])
    {
        parent::__construct();
        $this->template = $template;
    }

    public function render()
    {
        $engine = new Mustache_Engine();
        $rendered = $engine->render($this->template, $this->context);
        return $rendered;
    }
}

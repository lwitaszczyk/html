<?php

namespace Twig;

use Html\Tag;
use Twig_Environment;

class Twig extends Tag
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

    /**
     * @return string
     */
    public function render()
    {
        $engine = new Twig_Environment(new \Twig_Loader_Array([]));
        $rendered = $engine->render($this->template, [
            'template' => $this->context
        ]);
        return $rendered;
    }
}

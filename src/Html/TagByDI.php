<?php

namespace Html;

use Blocks\Application;

class TagByDI extends Tag
{

    /**
     * @var string
     */
    private $serviceName;

    /**
     * @param string $serviceName
     */
    public function __construct($serviceName)
    {
        parent::__construct();
        $this->serviceName = $serviceName;
    }

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        parent::build();
        $this->add([
            Application::getInstance()->getContainer()->get($this->serviceName),
        ]);
    }
}

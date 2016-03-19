<?php

namespace Html;

class Form extends Tag
{
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $method;

    /**
     * @param string $action
     * @param string $method
     */
    public function __construct($action = null, $method = self::METHOD_POST)
    {
        parent::__construct('form');
        $this->setAction($action);
        $this->setMethod($method);
    }

    /**
     * @param string $action
     *
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $method
     *
     * @return self
     */
    public function setMethod($method = self::METHOD_POST)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setAttribute('method', $this->method);
        $this->setAttribute('action', $this->action);

        return parent::render();
    }
}

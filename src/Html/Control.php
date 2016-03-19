<?php

namespace Html;

use Html\Common\Editable;

abstract class Control extends Tag implements Editable
{
    /**
     * @var int
     */
    private $tabIndex;

    /**
     * @var bool
     */
    private $disabled;

    /**
     * @var bool
     */
    private $readOnly;

    /**
     * @var string
     */
    private $placeholder;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $tag
     * @param string $name
     * @param mixed  $value
     */
    public function __construct($tag = null, $name = null, $value = null)
    {
        parent::__construct($tag, null, false, true);
        $this->addClass('control');

        $this->setName($name);
        $this->setValue($value);

        $this->tabIndex = null;
        $this->disabled = false;
        $this->readOnly = false;
        $this->placeholder = null;
    }

    /**
     * @param string $placeholder
     *
     * @return self
     */
    public function setPlaceholder($placeholder = null)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param bool $readonly
     *
     * @return self
     */
    public function setReadOnly($readonly = false)
    {
        $this->readOnly = (bool) $readonly;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReadOnly()
    {
        return $this->readOnly;
    }

    /**
     * @param bool $disabled
     *
     * @return self
     */
    public function setDisabled($disabled = false)
    {
        $this->disabled = (bool) $disabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param int $tabIndex
     *
     * @return self
     */
    public function setTabIndex($tabIndex = null)
    {
        $this->tabIndex = (int) $tabIndex;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTabIndex()
    {
        return $this->tabIndex;
    }

    public function build()
    {
        $this->addClass($this->getName());

        $this->setAttribute('disabled', 'disabled', $this->isDisabled());
        $this->setAttribute('readonly', 'readonly', $this->isReadOnly());
        $this->setAttribute('tabindex', $this->getTabIndex());
        $this->setAttribute('name', $this->getName());
        $this->setAttribute('value', $this->getValue());
        $this->setAttribute('placeholder', $this->getPlaceholder());

        return parent::build();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed|null $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

<?php

namespace Html\Common;

interface Editable
{
    /**
     * @param string $placeholder
     *
     * @return self
     */
    public function setPlaceholder($placeholder = null);
    /**
     * @return string
     */
    public function getPlaceholder();
    /**
     * @string bool $readonly
     *
     * @return self
     */
    public function setReadOnly($readonly = false);
    /**
     * @return bool
     */
    public function isReadOnly();
    /**
     * @param int $tabIndex
     *
     * @return self
     */
    public function setTabIndex($tabIndex = null);
    /**
     * @return int|null
     */
    public function getTabIndex();
    /**
     * @param bool $disabled
     *
     * @return self
     */
    public function setDisabled($disabled = false);
    /**
     * @return bool
     */
    public function isDisabled();
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name);
    /**
     * @return string
     */
    public function getName();
    /**
     * @return mixed|null
     */
    public function getValue();
    /**
     * @param mixed|null $value
     *
     * @return self
     */
    public function setValue($value);
}

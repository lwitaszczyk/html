<?php namespace Html;

class Select extends Control
{

    /**
     * @var int
     */
    private $size;

    /**
     * @var bool
     */
    private $multiple;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name = null, $value = null)
    {
        parent::__construct('select', $name, $value);
        $this->setMultiple(false);
        $this->setSize(null);
    }

    /**
     * @param int $size
     * @return $this
     */
    public function setSize($size = null)
    {
        $this->size = (int) $size;
        return $this;
    }

    /**
     * @param bool $multiple
     * @return $this
     */
    public function setMultiple($multiple = true)
    {
        $this->multiple = (bool) $multiple;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        $multiple = $this->isMultiple();

        if (!$multiple) {
            $this->updateValueBasedOnOptions();
        }

        $this->setAttribute('multiple', true, $multiple);
        $this->setAttribute('size', $this->getSize());
        parent::build();
    }

    /**
     *
     */
    protected function updateValueBasedOnOptions()
    {
        foreach ($this->getItems() as $item) {
            if (($item instanceof Option) && ($this->getValue() === $item->getValue())) {
                $item->setSelected(true);
                return;
            }
        }
    }
}

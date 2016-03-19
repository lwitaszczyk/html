<?php

namespace Html\Resource;

use Html\Item;
use Html\Tag;

final class MapItem
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var string[]
     */
    private $extends;

    /**
     * @var Item[]
     */
    private $instances;

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        $this->className = $className;
        $this->extends = [];
        $this->instances = [];

        do {
            $this->extends[] = $className;
            $className = get_parent_class($className);
        } while ($className);

        $this->extends = array_reverse($this->extends);
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return string[]
     */
    public function getExtends()
    {
        return $this->extends;
    }

    /**
     * @param Item $item
     * @return self
     */
    public function addInstance(Item $item)
    {
        $this->instances[] = $item;
        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getInstances()
    {
        return $this->instances;
    }
}

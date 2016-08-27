<?php

namespace Html\Dependency;

use Html\Item;

class Dependency
{
    /**
     * @return Item[]
     */
    public function getHeadDependencies()
    {
        return [];
    }

    /**
     * @return Item[]
     */
    public function getBodyDependencies()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }
}

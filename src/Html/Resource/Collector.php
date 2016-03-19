<?php

namespace Html\Resource;

interface Collector
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @param MapItem[] $mapItems
     */
    public function build(array $mapItems = []);
}

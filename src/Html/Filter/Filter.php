<?php

namespace Html\Filter;

interface Filter
{
    /**
     * @param string $content
     * @return string
     */
    public function transform($content);
}

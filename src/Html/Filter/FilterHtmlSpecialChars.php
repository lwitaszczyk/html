<?php

namespace Html\Filter;

class FilterHtmlSpecialChars implements Filter
{

    /**
     * {@inheritDoc}
     */
    public function transform($content)
    {
        return htmlentities($content);
    }
}

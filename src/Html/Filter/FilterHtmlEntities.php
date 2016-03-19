<?php

namespace Html\Filter;

class FilterHtmlEntities implements Filter
{
    
    /**
     * {@inheritDoc}
     */
    public function transform($content)
    {
        return htmlspecialchars($content);
    }
}

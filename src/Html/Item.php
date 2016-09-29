<?php

namespace Html;

interface Item
{
    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item = null);
    
    /**
     * @param Item[] $items
     * @return $this
     */
    public function add(array $items = []);
    
    /**
     * @return Item[]
     */
    public function getItems();
    
    /**
     * @return $this
     */
    public function build();
    
    /**
     * @return string
     */
    public function render();
}

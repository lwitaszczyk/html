<?php

namespace Html\Resource;

use Html\Dependency\Dependency;
use Html\Dependency\DependencyRegistry;
use Html\Item;

class Builder
{
    /**
     * @var string[]
     */
    private $resources;

    /**
     * @var MapItem[]
     */
    private $mapItems;

    /**
     * @var Collector[]
     */
    private $collectors;

    /**
     * @var DependencyRegistry
     */
    private $dependencyRegistry;

    /**
     * @var Dependency[]
     */
    private $requiredDependencies;

    /**
     * Builder constructor.
     * @param Collector[] $collectors
     * @param DependencyRegistry $dependencyRegistry
     */
    public function __construct(
        array $collectors = [],
        DependencyRegistry $dependencyRegistry
    ) {
        $this->resources = [];
        $this->collectors = $collectors;
        $this->dependencyRegistry = $dependencyRegistry;
        $this->requiredDependencies = [];
    }

    /**
     * @param string $type
     * @return string
     */
    public function getResource($type)
    {
        return implode('', $this->resources[$type]);
    }

    /**
     * @param Item $item
     * @return self
     */
    public function build(Item $item)
    {
        $this->mapItems = [];
        $this->resources = [];
        $this->buildMap($item);
        $this->buildResources();

        foreach ($this->mapItems as $mapItem)
        {
            $tag = $mapItem->getFirstInstance();
            $requiredDependencies = $tag->getRequiredDependencies();
            foreach ($requiredDependencies as $requiredDependency) {
                $this->requiredDependencies[$requiredDependency] =
                    $this->dependencyRegistry->getByName($requiredDependency);
            }
        }
        $this->requiredDependencies = array_reverse($this->requiredDependencies);

        return $this;
    }

    /**
     * @return Dependency[]
     */
    public function getRequiredDependencies()
    {
        return $this->requiredDependencies;
    }

    /**
     * @return self
     */
    private function buildResources()
    {
        foreach ($this->collectors as $collector) {
            $resource = $collector->build($this->mapItems);
            $type = $collector->getType();

            if (!isset($this->resources[$type])) {
                $this->resources[$type] = [];
            }
            $this->resources[$type][] = $resource;
        }
        return $this;
    }

    /**
     * @param Item $item
     * @return self
     */
    private function buildMap(Item $item)
    {
        foreach ($item->getItems() as $innerItem) {
            $this->buildMap($innerItem);
        }

        $this->buildMapForItem($item);

        return $this;
    }

    /**
     * @param Item $item
     * @return self
     */
    private function buildMapForItem(Item $item)
    {
        $className = get_class($item);
        if (empty($this->mapItems[$className])) {
            $mapItem = new MapItem($className);
            $this->mapItems[$className] = $mapItem;
        } else {
            $mapItem = $this->mapItems[$className];
        }
        $mapItem->addInstance($item);

        return $this;
    }
}

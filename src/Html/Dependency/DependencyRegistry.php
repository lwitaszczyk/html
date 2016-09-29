<?php

namespace Html\Dependency;

use Html\Dependency\Exception\DependencyAlreadyRegisteredException;
use Html\Dependency\Exception\DependencyNotFoundException;

class DependencyRegistry
{
    /**
     * @var Dependency[]
     */
    private $dependencies;

    /**
     * DependencyCollection constructor.
     * @param Dependency[] $dependencies
     */
    public function __construct(array $dependencies = [])
    {
        $this->dependencies = [];

        foreach ($dependencies as $dependency) {
            $this->addDependency($dependency);
        }
    }

    /**
     * @param $name
     * @return Dependency
     * @throws DependencyNotFoundException
     */
    public function getByName($name)
    {
        if (isset($this->dependencies[$name])) {
            return $this->dependencies[$name];
        }

        throw new DependencyNotFoundException($name);
    }

    /**
     * @param Dependency $dependency
     * @return $this
     * @throws DependencyAlreadyRegisteredException
     */
    private function addDependency(Dependency $dependency)
    {
        $name = $dependency->getName();
        if (!isset($this->dependencies[$name])) {
            $this->dependencies[$name] = $dependency;
            return $this;
        }

        throw new DependencyAlreadyRegisteredException($name);
    }
}

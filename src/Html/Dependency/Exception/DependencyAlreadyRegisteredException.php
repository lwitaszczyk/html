<?php

namespace Html\Dependency\Exception;

class DependencyAlreadyRegisteredException extends \Exception
{
    /**
     * DependencyNotFoundException constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct(
            sprintf('Dependency by name [%s] is already registered', $name)
        );
    }
}

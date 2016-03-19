<?php

namespace Html\Resource;

use ReflectionClass;

class Resources
{
    /**
     * @var string[]
     */
    private $fileNames;

    /**
     *
     */
    public function __construct()
    {
        $this->fileNames = [];
    }

    /**
     * @param $className
     * @param $extension
     * @return string
     */
    public function getResourceFileName($className, $extension)
    {
        if (empty($this->fileNames[$className])) {
            $reflectionClass = new ReflectionClass($className);
            $fileName = $reflectionClass->getFileName();
            $fileName = dirname($fileName) . DIRECTORY_SEPARATOR . basename($fileName, '.php');
            $this->fileNames[$className] = $fileName;
        } else {
            $fileName = $this->fileNames[$className];
        }
        return $fileName . '.' . $extension;
    }
}

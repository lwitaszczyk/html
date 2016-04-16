<?php

namespace Html\Resource;

use Blocks\Cache;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\Reader;
use Html\Annotation\Runnable;
use JavaScriptPacker;

class CollectorJs implements Collector
{

    /**
     * @var Resources
     */
    private $resourceFileName;

    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var bool
     */
    private $obfuscate;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string[]
     */
    private $resources;

    /**
     * @var string[]
     */
    private $runScript;

    /**
     * @var string
     */
    private $region;

    /**
     * @var AnnotationReader
     */
    private $annotationReader;

    /**
     * CollectorJs constructor.
     * @param Resources $resourceFileName
     * @param Cache $cache
     * @param Reader $annotationReader
     * @param bool $obfuscate
     * @param string $region
     */
    public function __construct(
        Resources $resourceFileName,
        Cache $cache,
        Reader $annotationReader,
        $obfuscate = true,
        $region = ''
    )
    {
        $this->resourceFileName = $resourceFileName;
        $this->cache = $cache;
        $this->obfuscate = (bool)$obfuscate;
        $this->region = $region;

        $this->extension = 'js';
        $this->resources = [];
        $this->type = 'js';

        $this->annotationReader = $annotationReader;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param MapItem[] $mapItems
     * @return string
     */
    public function build(array $mapItems = [])
    {
        foreach ($mapItems as $mapItem) {
            $jsClassName = null;
            foreach ($mapItem->getExtends() as $className) {
                $this->addResource($className);
                if ($this->resources[$className] !== '') {
                    $jsClassName = $className;
                }
            }
            $this->updateInstances($mapItem, $jsClassName);
        }

        return $this->generateFullScript();
    }

    /**
     * @param string $className
     * @return self
     */
    private function addResource($className)
    {
        if (!isset($this->resources[$className])) {
            $fileName = $this->resourceFileName->getResourceFileName($className, $this->extension);
            if (file_exists($fileName)) {
                $this->resources[$className] = file_get_contents($fileName) . "\n";
            } else {
                $this->resources[$className] = '';
            }
        }

        return $this;
    }

    /**
     * @param MapItem $mapItem
     * @param string $className
     */
    private function updateInstances(MapItem $mapItem, $className)
    {
        if (!is_null($className)) {

            $jsRunClass = str_replace('\\', '_', $className);

            $runnableAnnotation = $this->annotationReader->getClassAnnotation(
                new \ReflectionClass($className), Runnable::class
            );

            if ($runnableAnnotation instanceof Runnable) {
                foreach ($mapItem->getInstances() as $instance) {
                    $instance->addClass($jsRunClass);
                    $this->runScript[$jsRunClass] = sprintf('  $("%1$s .%2$s").each(function() {new %2$s(this)});', $this->region, $jsRunClass) . "\n";
                }
            }
        }
    }

    /**
     * @return string
     */
    private function generateFullScript()
    {
        $script = implode('', $this->resources);
        if (!empty($this->runScript)) {
            $script .= sprintf("\n$(function() {\n%s});\n", implode('', $this->runScript));
        }

        if ($this->obfuscate) {
            $key = md5($script . 'obfuscate') . '.js';
        } else {
            $key = md5($script . 'plain') . '.js';
        }

        $cacheScript = $this->cache->get($key);
        if (is_null($cacheScript)) {
            if ($this->obfuscate) {
                require_once 'class.javascriptpacker.php';
                $packer = new JavaScriptPacker($script, 'Normal');
                $script = $packer->pack();
            }
            $this->cache->set($key, $script);
        } else {
            $script = $cacheScript;
        }

        return $script;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }
}

<?php

namespace Html\Resource;

use Blocks\Cache;
use Leafo\ScssPhp\Compiler;

class CollectorScss implements Collector
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
    protected $resources;

    /**
     * @param Resources $resourceFileName
     * @param Cache $cache
     */
    public function __construct(Resources $resourceFileName, Cache $cache)
    {
        $this->resourceFileName = $resourceFileName;
        $this->type = 'css';
        $this->extension = 'scss';
        $this->resources = [];
        $this->cache = $cache;
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
            $this->buildResourceForItem($mapItem);
        }
        $saas = implode('', $this->resources);

        $key = md5($saas) . '.saas';
        $cacheCss = $this->cache->get($key);
        if (is_null($cacheCss)) {
            $compiler = new Compiler();
            $compiler->setFormatter(\Leafo\ScssPhp\Formatter\Compressed::class);
            $css = $compiler->compile($saas);
            $this->cache->set($key, $css);
        } else {
            $css = $cacheCss;
        }

        return $css;
    }

    /**
     * @param MapItem $mapItem
     * @return self
     */
    protected function buildResourceForItem(MapItem $mapItem)
    {
        foreach ($mapItem->getExtends() as $className) {
            $this->buildResourceForClass($className);
        }
        return $this;
    }

    /**
     * @param string $className
     * @return self
     */
    protected function buildResourceForClass($className)
    {
        if (empty($this->resources[$className])) {
            $fileName = $this->resourceFileName->getResourceFileName($className, $this->extension);
            if (file_exists($fileName)) {
                $this->resources[$className] = file_get_contents($fileName) . "\n";
            }
        }
        return $this;
    }
}

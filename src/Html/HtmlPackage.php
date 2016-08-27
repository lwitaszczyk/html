<?php

namespace Html;

use Blocks\Application;
use Blocks\DI\DIAsAlias;
use Blocks\DI\DIAsSingletonAsClass;
use Blocks\DI\DIByConfiguration;
use Blocks\DI\DIByService;
use Blocks\DI\DIByTag;
use Blocks\DI\DIContainer;
use Blocks\Package;
use Html\Dependency\DependencyRegistry;
use Html\Dependency\Dependency;
use Html\Resource\Builder;
use Html\Resource\Collector;
use Html\Resource\CollectorJs;
use Html\Resource\CollectorScss;
use Html\Resource\Resources;

class HtmlPackage extends Package
{
    const RESOURCE_BUILDER = Builder::class;
    const RESOURCE_CACHE = 'html-resource-cache';
    const RESOURCE_FILE_NAME = Resources::class;
    const RESOURCE_COLLECTOR_TAG = Collector::class;
    const RESOURCE_COLLECTOR_JS = CollectorJs::class;
    const RESOURCE_COLLECTOR_SCSS = CollectorScss::class;

    /**
     * HtmlPackage constructor.
     * @param DIContainer $container
     */
    public function __construct(DIContainer $container)
    {
        parent::__construct();

        $container->addServices([
            (new DIAsAlias(self::RESOURCE_CACHE, Application::CACHE)),

            (new DIAsSingletonAsClass(Resources::class)),

            (new DIAsSingletonAsClass(DependencyRegistry::class))->addArguments([
                new DIByTag(Dependency::class),
            ]),

            (new DIAsSingletonAsClass(Builder::class))->addArguments([
                new DIByTag(Collector::class),
                new DIByService(DependencyRegistry::class),
            ]),

            (new DIAsSingletonAsClass(CollectorJs::class))->addArguments([
                new DIByService(Resources::class),
                new DIByService(self::RESOURCE_CACHE),
                new DIByService(Application::ANNOTATIONS_READER),
                new DIByConfiguration('html.javascript.obfuscate', false)
            ])->addTag(Collector::class),

            (new DIAsSingletonAsClass(CollectorScss::class))->addArguments([
                new DIByService(Resources::class),
                new DIByService(self::RESOURCE_CACHE),
            ])->addTag(Collector::class),
        ]);
    }
}

<?php

namespace Html;

use Blocks\Application;
use Blocks\DI\DIAsAlias;
use Blocks\DI\DIAsSingleton;
use Blocks\DI\DIByConfiguration;
use Blocks\DI\DIByService;
use Blocks\DI\DIByTag;
use Blocks\DI\DIContainer;
use Blocks\Package;
use Html\Resource\Builder;
use Html\Resource\CollectorJs;
use Html\Resource\CollectorScss;
use Html\Resource\Resources;

class HtmlPackage extends Package
{
    const RESOURCE_BUILDER = 'html-resource-builder';
    const RESOURCE_CACHE = 'html-resource-cache';
    const RESOURCE_FILE_NAME = 'html-resource-resource-file-name';
    const RESOURCE_COLLECTOR_TAG = 'html-resource-collector';
    const RESOURCE_COLLECTOR_JS = 'html-resource-collector-js';
    const RESOURCE_COLLECTOR_TS = 'html-resource-collector-ts';
    const RESOURCE_COLLECTOR_SCSS = 'html-resource-collector-scss';

    /**
     * HtmlPackage constructor.
     * @param DIContainer $container
     */
    public function __construct(DIContainer $container)
    {
        parent::__construct();

        $container->addServices([
            (new DIAsAlias(self::RESOURCE_CACHE, Application::CACHE)),
        ]);

        $container->addServices([
            (new DIAsSingleton(self::RESOURCE_FILE_NAME, Resources::class)),
        ]);

        $container->addServices([
            (new DIAsSingleton(self::RESOURCE_COLLECTOR_JS, CollectorJs::class))->addArguments([
                new DIByService(self::RESOURCE_FILE_NAME),
                new DIByService(self::RESOURCE_CACHE),
                new DIByService(Application::ANNOTATIONS_READER),
                new DIByConfiguration('html.javascript.obfuscate', false)
            ])->addTag(self::RESOURCE_COLLECTOR_TAG),
        ]);

        $container->addServices([
            (new DIAsSingleton(self::RESOURCE_COLLECTOR_SCSS, CollectorScss::class))->addArguments([
                new DIByService(self::RESOURCE_FILE_NAME),
                new DIByService(self::RESOURCE_CACHE),
            ])->addTag(self::RESOURCE_COLLECTOR_TAG),
        ]);

        $container->addServices([
            (new DIAsSingleton(self::RESOURCE_BUILDER, Builder::class))->addArguments([
                new DIByTag(self::RESOURCE_COLLECTOR_TAG),
            ]),
        ]);
    }
}

<?php

namespace Html\Response;

use Blocks\Http\HttpApplication;
use Blocks\Http\Response;
use Html\Html;
use Html\Resource\Builder;
use Html\Script;
use Html\Style;

class ResponseAsDocument extends Response
{
    /**
     * @var string
     */
    private $renderedContent;

    /**
     * @var Html
     */
    private $html;

    /**
     * @param Html $html
     * @param int $status
     */
    public function __construct(Html $html, $status = self::HTTP_OK)
    {
        parent::__construct(null, $status, self::CONTENT_TYPE_TEXT_HTML);
        $this->html = $html;
        $this->renderedContent = null;
    }

    /**
     * @return string
     */
    public function getContent()
    {
//        if (is_null($this->renderedContent)) {

            /**
             * @var Builder $builder
             */
            $builder = HttpApplication::getInstance()->getContainer()->get(Builder::class);

            $this->html->build();
            $builder->build($this->html);

            foreach ($builder->getRequiredDependencies() as $requiredDependency) {
                $this->html->getHead()->add(
                    $requiredDependency->getHeadDependencies()
                );
                $this->html->add(
                    $requiredDependency->getBodyDependencies()
                );
            }

            $this->html->getHead()->add([
                (new Style())->setContent($builder->getResource('css')),
            ]);
            $this->html->add([
                (new Script())->setContent($builder->getResource('js')),
            ]);

            $this->renderedContent = $this->html->render();

            $this->setContent($this->renderedContent);
//        }

        return $this->renderedContent;
    }
}

<?php

namespace Html\Response;

use Blocks\Http\Response;
use Blocks\Application;
use Html\Html;
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
        if (is_null($this->renderedContent)) {
            $builder = Application::getInstance()->getContainer()->get('html-resource-builder');

            $this->html->build();
            $builder->build($this->html);

            $this->html->getHead()->add([
                (new Style())->setContent($builder->getResource('css')),
            ]);
            $this->html->add([
                (new Script())->setContent($builder->getResource('js')),
            ]);

            $this->renderedContent = $this->html->render();

            $this->setContent($this->renderedContent);
        }

        return $this->renderedContent;
    }
}

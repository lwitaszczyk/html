<?php

namespace Html\Response;

use Blocks\Http\Response;
use Blocks\Application;
use Html\Tag;

class ResponseAsJSONComponent extends Response
{

    /**
     * @var string
     */
    private $renderedContent;

    /**
     * @var Tag
     */
    private $tag;

    /**
     * @param Tag $tag
     * @param int $status
     */
    public function __construct(Tag $tag, $status = self::HTTP_OK)
    {
        parent::__construct(null, $status, self::CONTENT_TYPE_APPLICATION_JSON);
        $this->tag = $tag;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        if (is_null($this->renderedContent)) {
            $builder = Application::getInstance()->getContainer()->get('html-resource-builder');


            $this->tag->build();
            $builder->build($this->tag);

            $json = json_encode([
                'html' => $this->tag->render(),
                'css' => $builder->getResource('css'),
                'js' => $builder->getResource('js'),
            ]);

            $this->renderedContent = $json;
            
            $this->setContent($this->renderedContent);
        }

        return $this->renderedContent;
    }
}

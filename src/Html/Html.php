<?php

namespace Html;

class Html extends Tag
{
    const DOC_TYPE_HTML5 = '<!DOCTYPE html>';
    const DOC_TYPE_HTML4 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.=w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns=3D"http://www.w3.org/1999/xhtml">';

    /**
     * @var Head
     */
    private $head = null;

    /**
     * @var Body
     */
    private $body = null;

    /**
     * @var string
     */
    private $title = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $keywords = null;

    /**
     */
    public function __construct()
    {
        parent::__construct('html');

        $this->head = new Head();
        $body = new Body();

        $this->add([
            $this->head,
            $body,
        ]);

        $this->body = $body;
    }

    /**
     * @return Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        if (null === $this->title) {
            return filter_input(INPUT_SERVER, 'HTTP_HOST');
        }
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title = null)
    {
        $this->title = (string)$title;
        return $this;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = (string)$description;
        return $this;
    }

    /**
     * @param string $keywords
     *
     * @return self
     */
    public function setKeywords($keywords = null)
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        $this->getHead()->add([
            (new Meta())->setAttribute('http-equiv', 'Content-Type')->setAttribute('content', 'text/html; charset=UTF-8'),
            (new Tag('title', $this->getTitle())),
            (!is_null($this->description)) ? (new Meta())->setAttribute('description', $this->description) : null,
            (!is_null($this->keywords)) ? (new Meta())->setAttribute('keywords', $this->description) : null,
        ]);
        return parent::build();
    }

    public function render()
    {
        return self::DOC_TYPE_HTML5 . parent::render();
    }

    /**
     * @param Item $item
     *
     * @return Item
     */
    public function addItem(Item $item = null)
    {
        $body = $this->getBody();
        if (is_null($body)) {
            return parent::addItem($item);
        } else {
            return $body->addItem($item);
        }
    }
}

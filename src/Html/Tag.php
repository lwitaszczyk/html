<?php

namespace Html;

use Html\Filter\Filter;

class Tag implements Item
{

    /**
     * @var string
     */
    private $tag;

    /**
     * @var Item
     */
    private $parent;

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $style;

    /**
     * @var string[]
     */
    private $classes;

    /**
     * @var string[]
     */
    private $attributes;

    /**
     * @var bool
     */
    private $shortClosed;

    /**
     * @var Filter[]
     */
    private $filters;

    /**
     * @param string $tag
     * @param string $content
     * @param bool $shortClosed
     */
    public function __construct($tag = null, $content = '', $shortClosed = false)
    {
        $this->content = $content;
        $this->parent = null;
        $this->items = [];
        $this->filters = [];

        $this->setTag($tag);
        $this->setShortClosed($shortClosed);

        $this->id = null;
        $this->style = '';
        $this->classes = [];
        $this->attributes = [];
    }

    /**
     * @param bool|false $shortClosed
     * @return $this
     */
    public function setShortClosed($shortClosed = false)
    {
        $this->shortClosed = $shortClosed;
        return $this;
    }

    /**
     * @param array $filters
     * @return $this
     */
    public function addFilters(array $filters = [])
    {
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }
        return $this;
    }

    /**
     * @param Filter $filter
     * @return $this
     */
    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritDoc}
     */
    public function add(array $items = [])
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addItem(Item $item = null)
    {
        if (!is_null($item)) {
            $this->items[] = $item;
            $item->parent = $this;
            return $item;
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addTo(Item $item, array $items = [])
    {
        $item->add($items);
        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     * @return Item
     */
    public function setTag($tag = null)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param string $style
     * @return $this
     */
    public function setStyle($style = null)
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param string $class
     * @param bool $provided
     * @return $this
     */
    public function addClass($class = '', $provided = true)
    {
        if ($provided && !empty($class)) {
            $classItems = explode(' ', trim($class));
            foreach ($classItems as $className) {
                $this->classes[$className] = $className;
            }
        }

        return $this;
    }

    /**
     * @param string $class
     * @param bool|true $provided
     * @return $this
     */
    public function removeClass($class = '', $provided = true)
    {
        if ($provided && !empty($class)) {
            $classItems = explode(' ', $class);
            foreach ($classItems as $className) {
                if (isset($this->classes[$className])) {
                    unset($this->classes[$className]);
                }
            }
        }
        return $this;
    }

    /**
     * @param string $name
     * @param mixed|null $default
     * @return mixed|null
     */
    public function getAttribute($name, $default = null)
    {
        return (isset($this->attributes[$name]) ? $this->attributes[$name] : $default);
    }

    /**
     * @return String
     */
    public function __toString()
    {
        $this->build();
        return $this->render();
    }

    /**
     * @return self
     */
    public function build()
    {
        foreach ($this->getItems() as $item) {
            $item->build();
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->renderHTMLAttributes();
        $content = $this->renderContent();
        $tag = $this->renderTag($content);
        return $tag;
    }

    /**
     * @param $name
     * @param mixed|null $value
     * @param bool $provided set attribute is true (default)
     * @return $this
     */
    public function setAttribute($name, $value = null, $provided = true)
    {
        if ((!is_null($value)) && ($provided)) {
            $this->attributes[$name] = htmlentities($value);
        } else {
            unset($this->attributes[$name]);
        }

        return $this;
    }

    /**
     * @param $name
     * @param null $value
     * @return Tag
     */
    public function setDataAttribute($name, $value = null) {
        return $this->setAttribute("data-$name", $value);
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    public function getDataAttribute($name, $default = null)
    {
        return $this->getAttribute("data-$name", $default);
    }

    /**
     * {@inheritDoc}
     */
    public function getContent()
    {
        $content = is_null($this->content) ? '' : $this->content;
        return $content;
    }

    /**
     * {@inheritDoc}
     */
    public function setContent($content = null)
    {
        $this->content = (string)$content;
        return $this;
    }

    /**
     * @return string
     */
    private function renderContent()
    {
        $content = $this->getContent();

        foreach ($this->filters as $filter) {
            $content = $filter->transform($content);
        }

        foreach ($this->items as $item) {
            $content .= $item->render();
        }

        return $content;
    }

    /**
     * @param string $content
     * @return string
     */
    private function renderTag($content)
    {
        if (!is_null($this->tag)) {
            $attributes = '';
            foreach ($this->attributes as $attributeName => $attribute) {
                $attributes .= sprintf(' %s="%s"', $attributeName, $attribute);
            }

            $htmlAttributes = (trim($attributes) === '') ? '' : ' ' . trim($attributes);
            $format = ($this->shortClosed) ? '<%1$s%3$s>' : '<%1$s%3$s>%2$s</%1$s>';
            $content = sprintf($format, $this->tag, $content, $htmlAttributes);
        }
        return $content;
    }

    /**
     * @return $this
     */
    private function renderHTMLAttributes()
    {
        $this->setAttribute('id', $this->id);
        if (!empty($this->classes)) {
            $classes = implode(' ', $this->classes);
            $this->setAttribute('class', $classes, ($this->classes !== ''));
        }
        $this->setAttribute('style', $this->style, ($this->style !== ''));

        return $this;
    }
}

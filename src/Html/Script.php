<?php

namespace Html;

class Script extends Tag
{
    /**
     * @var bool
     */
    private $inline;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $src;

    /**
     * @param string $src
     * @param string $type
     */
    public function __construct($src = null, $type = 'text/javascript')
    {
        parent::__construct('script', '');
        $this->src = $src;
        $this->type = $type;
        $this->inline = false;
    }

    /**
     * @param bool $inline
     *
     * @return self
     */
    public function setInline($inline = false)
    {
        $this->inline = (bool) $inline;

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        if (($this->inline) && ($this->isFileExists($this->src))) {
            $this->setContent(file_get_contents($this->src));
            $this->src = null;
        }
        if ($this->getContent() !== '') {
            $this->setShortClosed(false);
        }
        $this->setAttribute('src', $this->src);
        $this->setAttribute('type', $this->type);

        return parent::render();
    }

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function getFileContents($fileName)
    {
        return file_get_contents($fileName);
    }

    /**
     * @param string $fileName
     *
     * @return bool
     */
    public function isFileExists($fileName)
    {
        return file_exists($fileName);
    }
}

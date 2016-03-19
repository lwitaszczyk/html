<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class CanvasSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Canvas');
    }

    public function it_should_get_previously_set_width()
    {
        $width = 100;
        $this->setWidth($width);
        $this->getWidth()->shouldEqual($width);
    }

    public function it_should_get_previously_set_height()
    {
        $height = 100;
        $this->setHeight($height);
        $this->getHeight()->shouldEqual($height);
    }

    public function it_should_render_canvas_tag()
    {
        $this->__toString()->shouldEqual('<canvas></canvas>');
    }

    public function it_should_render_canvas_tag_with_width_and_height()
    {
        $this->beConstructedWith(100, 200);
        $this->__toString()->shouldEqual('<canvas width="100" height="200"></canvas>');
    }
}

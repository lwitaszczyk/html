<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ThSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Th');
    }

    public function it_should_render_td_tag()
    {
        $this->__toString()->shouldEqual('<th></th>');
    }

    public function it_should_render_td_tag_with_colspan_and_rowspan()
    {
        $this->beConstructedWith('CONTENT');
        $this->__toString()->shouldEqual('<th>CONTENT</th>');

        $this->setColspan(2);
        $this->setRowspan(3);
        $this->__toString()->shouldEqual('<th colspan="2" rowspan="3">CONTENT</th>');
    }

    public function it_should_render_td_tag_with_colspan()
    {
        $this->beConstructedWith('COLSPAN-CONTENT');
        $this->setColspan(2);
        $this->__toString()->shouldEqual('<th colspan="2">COLSPAN-CONTENT</th>');
    }

    public function it_should_render_td_tag_with_rowspan()
    {
        $this->beConstructedWith('ROWSPAN-CONTENT');
        $this->setRowspan(3);
        $this->__toString()->shouldEqual('<th rowspan="3">ROWSPAN-CONTENT</th>');
    }
}

<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class TdSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Td');
    }

    public function it_should_render_td_tag()
    {
        $this->__toString()->shouldEqual('<td></td>');
    }

    public function it_should_render_td_tag_with_colspan_and_rowspan()
    {
        $this->beConstructedWith('CONTENT');
        $this->__toString()->shouldEqual('<td>CONTENT</td>');

        $this->setColspan(2);
        $this->setRowspan(3);
        $this->__toString()->shouldEqual('<td colspan="2" rowspan="3">CONTENT</td>');
    }

    public function it_should_render_td_tag_with_colspan()
    {
        $this->beConstructedWith('COLSPAN-CONTENT');
        $this->setColspan(2);
        $this->__toString()->shouldEqual('<td colspan="2">COLSPAN-CONTENT</td>');
    }

    public function it_should_render_td_tag_with_rowspan()
    {
        $this->beConstructedWith('ROWSPAN-CONTENT');
        $this->setRowspan(3);
        $this->__toString()->shouldEqual('<td rowspan="3">ROWSPAN-CONTENT</td>');
    }
}

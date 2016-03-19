<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class LegendSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Legend');
    }

    public function it_should_render_legend_tag()
    {
        $this->__toString()->shouldEqual('<legend></legend>');
    }
}

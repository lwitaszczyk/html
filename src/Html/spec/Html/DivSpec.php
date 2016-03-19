<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class DivSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Div');
    }

    public function it_should_render_div_tag()
    {
        $this->__toString()->shouldEqual('<div></div>');
    }
}

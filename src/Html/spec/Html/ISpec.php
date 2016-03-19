<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ISpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\I');
    }

    public function it_should_render_i_tag()
    {
        $this->__toString()->shouldEqual('<i></i>');
    }
}

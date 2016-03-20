<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class H4Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\H4');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<h4></h4>');
    }
}

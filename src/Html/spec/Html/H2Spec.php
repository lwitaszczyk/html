<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class H2Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\H2');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<h2></h2>');
    }
}

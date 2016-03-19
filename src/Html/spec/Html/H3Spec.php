<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class H3Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\H3');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<h3></h3>');
    }
}

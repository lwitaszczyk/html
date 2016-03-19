<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class H1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\H1');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<h1></h1>');
    }
}

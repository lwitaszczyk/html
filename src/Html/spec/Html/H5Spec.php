<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class H5Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\H5');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<h5></h5>');
    }
}

<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class LiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Li');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<li></li>');
    }
}

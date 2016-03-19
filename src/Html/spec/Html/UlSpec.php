<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class UlSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Ul');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<ul></ul>');
    }
}

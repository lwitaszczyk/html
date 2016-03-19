<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class PlainSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('--PLAIN-HTML--');
        $this->shouldHaveType('Html\Plain');
    }

    public function it_should_render_a_tag()
    {
        $this->beConstructedWith('--PLAIN-HTML--');
        $this->__toString()->shouldEqual('--PLAIN-HTML--');
    }
}

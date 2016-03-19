<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class MetaSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Meta');
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<meta>');
    }
}

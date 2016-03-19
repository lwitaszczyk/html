<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class StrongSpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Strong');
    }

    public function it_should_render_strong_tag()
    {
        $this->__toString()->shouldEqual('<strong></strong>');
    }
}

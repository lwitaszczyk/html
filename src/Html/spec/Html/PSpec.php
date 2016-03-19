<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class PSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\P');
    }

    public function it_should_render_p_tag()
    {
        $this->__toString()->shouldEqual('<p></p>');
    }
}

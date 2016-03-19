<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class BodySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Body');
    }

    public function it_should_render_body_tag()
    {
        $this->__toString()->shouldEqual('<body></body>');
    }
}

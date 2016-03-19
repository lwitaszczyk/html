<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class HeadSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Head');
    }

    public function it_should_render_head_tag()
    {
        $this->__toString()->shouldEqual('<head></head>');
    }
}

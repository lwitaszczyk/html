<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class CodeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Code');
    }

    public function it_should_render_code_tag()
    {
        $this->__toString()->shouldEqual('<code>');
    }
}

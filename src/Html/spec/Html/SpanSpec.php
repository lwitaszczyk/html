<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class SpanSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Span');
    }

    public function it_should_render_span_tag()
    {
        $this->__toString()->shouldEqual('<span></span>');
    }
}

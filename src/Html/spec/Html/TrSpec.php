<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class TrSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Tr');
    }

    public function it_should_render_tr_tag()
    {
        $this->__toString()->shouldEqual('<tr></tr>');
    }
}

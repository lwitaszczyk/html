<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class OptGroupSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('LABEL');
        $this->shouldHaveType('Html\OptGroup');
    }

    public function it_should_get_previously_set_label()
    {
        $label = 'LABEL';
        $this->beConstructedWith($label);
        $this->getLabel()->shouldEqual($label);
    }

    public function it_should_render_optgroup_tag()
    {
        $this->beConstructedWith('LABEL');
        $this->__toString()->shouldEqual('<optgroup label="LABEL">');
    }
}

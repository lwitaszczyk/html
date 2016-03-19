<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class OptionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('LABEL');
        $this->shouldHaveType('Html\Option');
    }

    public function it_should_get_previously_set_label()
    {
        $label = 'LABEL';
        $this->beConstructedWith($label);
        $this->getLabel()->shouldEqual($label);
    }

    public function it_should_render_option_tag()
    {
        $this->beConstructedWith('LABEL');
        $this->__toString()->shouldEqual('<option>LABEL</option>');

        $value = 100;
        $this->setValue($value);
        $this->getValue()->shouldEqual($value);

        $this->__toString()->shouldEqual('<option value="100">LABEL</option>');
    }
}

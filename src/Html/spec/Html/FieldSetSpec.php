<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class FieldSetSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\FieldSet');
    }

    public function it_should_render_fieldset_tag()
    {
        $this->__toString()->shouldEqual('<fieldset></fieldset>');
    }

    public function it_should_render_fieldset_tag_with_legend()
    {
        $this->beConstructedWith('caption');
        $this->__toString()->shouldEqual('<fieldset><legend>caption</legend></fieldset>');
    }
}

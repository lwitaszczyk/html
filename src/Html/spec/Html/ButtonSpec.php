<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ButtonSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Button');
    }

    public function it_should_render_default_button_tag()
    {
        $this->__toString()->shouldEqual('<button type="submit"></button>');
    }

    public function it_should_render_fieldset_tag_with_legend()
    {
        $this->beConstructedWith('caption', 'button');
        $this->__toString()->shouldEqual('<button type="button">caption</button>');
    }
}

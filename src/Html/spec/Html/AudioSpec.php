<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class AudioSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Audio');
    }

    public function it_should_render_audio_tag()
    {
        $this->__toString()->shouldEqual('<audio></audio>');
    }
}

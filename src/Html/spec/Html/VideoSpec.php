<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class VideoSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Video');
    }

    public function it_should_render_video_tag()
    {
        $this->__toString()->shouldEqual('<video></video>');
    }
}

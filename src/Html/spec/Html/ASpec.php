<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ASpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\A');
    }

    public function it_should_get_previously_set_href()
    {
        $href = 'LINK';
        $this->setHref($href);
        $this->getHref()->shouldEqual($href);
    }

    public function it_should_get_previously_set_caption()
    {
        $caption = 'CAPTION';
        $this->setCaption($caption);
        $this->getCaption()->shouldEqual($caption);
    }

    public function it_should_get_previously_set_blank()
    {
        $this->setBlank(true);
        $this->getBlank()->shouldEqual(true);

        $this->setBlank('NOT_BOOL');
        $this->getBlank()->shouldEqual(true);
    }

    public function it_should_render_a_tag()
    {
        $this->__toString()->shouldEqual('<a></a>');
    }

    public function it_should_render_a_tag_with_parameters()
    {
        $this->beConstructedWith('domain.com/link', 'caption', true);
        $this->__toString()->shouldEqual('<a href="domain.com/link" target="_blank">caption</a>');

        $this->setRel('nofollow');
        $this->__toString()->shouldEqual('<a href="domain.com/link" target="_blank" rel="nofollow">caption</a>');
    }
}

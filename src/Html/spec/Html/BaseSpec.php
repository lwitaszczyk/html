<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class BaseSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Base');
    }

    public function it_should_get_previously_set_href()
    {
        $href = 'LINK';
        $this->setHref($href);
        $this->getHref()->shouldEqual($href);
    }

    public function it_should_render_base_tag()
    {
        $this->__toString()->shouldEqual('<base></base>');
    }

    public function it_should_render_base_tag_with_href()
    {
        $this->beConstructedWith('domain.com/link');
        $this->__toString()->shouldEqual('<base href="domain.com/link"></base>');
    }
}

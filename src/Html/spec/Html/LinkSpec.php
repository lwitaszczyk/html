<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class LinkSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Link');
    }

    public function it_should_get_previously_set_rel()
    {
        $rel = 'REL';
        $this->setRel($rel);
        $this->getRel()->shouldEqual($rel);
    }

    public function it_should_get_previously_set_href()
    {
        $href = 'HREF';
        $this->setHref($href);
        $this->getHref()->shouldEqual($href);
    }

    public function it_should_get_previously_set_type()
    {
        $type = 'TYPE';
        $this->setType($type);
        $this->getType()->shouldEqual($type);
    }

    public function it_should_get_previously_set_media()
    {
        $media = 'MEDIA';
        $this->setMedia($media);
        $this->getMedia()->shouldEqual($media);
    }

    public function it_should_render_link_tag()
    {
        $this->__toString()->shouldEqual('<link>');
    }

    public function it_should_render_a_tag_with_parameters()
    {
        $this->beConstructedWith('REL', 'HREF', 'TYPE', 'MEDIA');
        $this->__toString()->shouldEqual('<link href="HREF" rel="REL" type="TYPE" media="MEDIA">');
    }
}

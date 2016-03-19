<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ImgSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Img');
    }

    public function it_should_get_previously_set_src()
    {
        $src = 'SRC';
        $this->setSrc($src);
        $this->getSrc()->shouldEqual($src);
    }

    public function it_should_get_previously_set_alt()
    {
        $alt = 'ALT';
        $this->setAlt($alt);
        $this->getAlt()->shouldEqual($alt);
    }

    public function it_should_render_img_tag()
    {
        $this->__toString()->shouldEqual('<img>');
    }

    public function it_should_render_img_tag_with_src()
    {
        $this->setSrc('SRC');
        $this->__toString()->shouldEqual('<img src="SRC">');
    }

    public function it_should_render_img_tag_with_alt()
    {
        $this->setAlt('ALT');
        $this->__toString()->shouldEqual('<img alt="ALT">');
    }

    public function it_should_render_img_tag_with_parameters()
    {
        $this->beConstructedWith('domain.com/image-link', 'alt-description');
        $this->__toString()->shouldEqual('<img src="domain.com/image-link" alt="alt-description">');
    }
}

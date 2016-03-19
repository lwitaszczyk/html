<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class ScriptSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Script');
    }

//    function it_should_get_previously_set_href()
//    {
//        $href = 'LINK';
//        $this->setHref($href);
//        $this->getHref()->shouldEqual($href);
//    }
//
//    function it_should_get_previously_set_caption()
//    {
//        $caption = 'CAPTION';
//        $this->setCaption($caption);
//        $this->getCaption()->shouldEqual($caption);
//    }
//
//    function it_should_get_previously_set_blank()
//    {
//        $this->setBlank(true);
//        $this->getBlank()->shouldEqual(true);
//        
//        $this->setBlank('NOT_BOOL');
//        $this->getBlank()->shouldEqual(true);
//    }

    public function it_should_render_script_tag()
    {
        $this->__toString()->shouldEqual('<script type="text/javascript"></script>');
    }

    public function it_should_render_script_tag_with_params()
    {
        $this->beConstructedWith('domain.com/link');
        $this->__toString()->shouldEqual('<script src="domain.com/link" type="text/javascript"></script>');
    }

//    function it_should_render_script_tag_with_inline_content()
//    {
//        $fileName = 'path/to/filename.js';
//        $this->beConstructedWith($fileName);
//        $this->setInline(true);
//        $this->isFileExists($fileName)->willReturn(true);
//        $this->getFileContents($fileName)->willReturn('JAVASCRIPT CONTENT');
//        $this->__toString()->shouldEqual('<script src="domain.com/link" type="text/javascript"></script>');
//    }
}

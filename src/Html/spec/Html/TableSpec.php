<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class TableSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Table');
    }

    public function it_should_render_table_tag()
    {
        $this->__toString()->shouldEqual('<table></table>');
    }
}

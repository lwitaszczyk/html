<?php

namespace spec\Html;

use PhpSpec\ObjectBehavior;

class FormSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Form');
    }

    public function it_should_get_previously_set_action()
    {
        $action = 'ACTION';
        $this->setAction($action);
        $this->getAction()->shouldEqual($action);
    }

    public function it_should_get_previously_set_method()
    {
        $method = 'METHOD';
        $this->setMethod($method);
        $this->getMethod()->shouldEqual($method);
    }

    public function it_should_render_form_tag()
    {
        $this->__toString()->shouldEqual('<form></form>');
    }

    public function it_should_render_a_tag_with_parameters()
    {
        $this->beConstructedWith('ACTION', 'METHOD');
        $this->__toString()->shouldEqual('<form method="METHOD" action="ACTION"></form>');
    }
}

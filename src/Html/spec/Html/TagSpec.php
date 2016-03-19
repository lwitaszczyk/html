<?php

namespace spec\Html;

use Html\Tag;
use PhpSpec\ObjectBehavior;

class TagSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Html\Tag');
        $this->shouldImplement('Html\Item');
    }

    public function it_should_get_previously_set_content()
    {
        $this->getContent()->shouldBeLike('');

        $content = 'CONTENT';
        $this->setContent($content);
        $this->getContent()->shouldBeLike($content);
    }

    public function it_should_get_parent_if_item_is_added()
    {
        $parent = new Tag();
        $parent->add([
            $this->getWrappedObject(),
        ]);
        $this->getParent()->shouldEqual($parent);
    }

    public function it_should_get_added_items_and_render_with_items()
    {
        $items = [
            (new Tag('tag', 'A')),
            (new Tag(null, 'B')),
            (new Tag(null, 'C')),
            (new Tag('tag'))->setShortClosed(true),
        ];
        $this->add($items);
        $this->getItems()->shouldBeLike($items);
        $this->render()->shouldEqual('<tag>A</tag>BC<tag>');
    }

    public function it_should_get_rendered_content()
    {
        $this->render()->shouldBeLike('');

        $content = 'CONTENT';
        $this->setContent($content);
        $this->render()->shouldEqual($content);
        $this->__toString()->shouldEqual($content);

        $this->setContent(null);
        $this->__toString()->shouldEqual('');
    }

    public function it_should_get_previously_set_tag()
    {
        $this->getTag()->shouldBe(null);
        $tag = 'TAG';
        $this->setTag($tag);
        $this->getTag()->shouldEqual($tag);
    }

    public function it_should_get_previously_set_id()
    {
        $this->getId()->shouldBe(null);
        $id = 'ID';
        $this->setId($id);
        $this->getId()->shouldEqual($id);
    }

    public function it_should_get_previously_set_style()
    {
        $this->getStyle()->shouldBe('');
        $style = 'STYLE';
        $this->setStyle($style);
        $this->getStyle()->shouldEqual($style);
    }
//
//    public function it_should_get_previously_set_data_name()
//    {
//        $dataName = 'DATA_NAME';
//        $this->setDataName($dataName);
//        $this->getDataName()->shouldEqual($dataName);
//    }
//
//    public function it_should_get_previously_set_data_section()
//    {
//        $dataSection = 'DATA_SECTION';
//        $this->setDataSection($dataSection);
//        $this->getDataSection()->shouldEqual($dataSection);
//    }
//
//    public function it_should_get_previously_set_data_value()
//    {
//        $dataValue = 'DATA_VALUE';
//        $this->setDataValue($dataValue);
//        $this->getDataValue()->shouldEqual($dataValue);
//    }
//
//    public function it_should_get_previously_set_data()
//    {
//        $data = [
//            'field1' => 'value1',
//            'field2' => 'value2',
//        ];
//        $this->setData($data);
//        $this->getData()->shouldBeLike($data);
//    }

    public function it_should_render_empty_div()
    {
        $this->beConstructedWith('div');
        $this->render()->shouldEqual('<div></div>');
    }

    public function it_should_render_tag_with_content()
    {
        $content = '--content--';
        $this->beConstructedWith('tag', $content);
        $this->__toString()->shouldEqual('<tag>' . $content . '</tag>');
    }

    public function it_should_render_div_with_items()
    {
        $this->beConstructedWith('div');
        $this->add([
            new Tag('div'),
            new Tag('span'),
            new Tag('div'),
        ]);
        $this->render()->shouldEqual('<div><div></div><span></span><div></div></div>');
    }

    public function it_should_render_only_items()
    {
        $this->beConstructedWith();
        $this->add([
            new Tag('div'),
            new Tag('span'),
            new Tag('div'),
        ]);
        $this->render()->shouldEqual('<div></div><span></span><div></div>');
    }

    public function it_should_render_div_with_classes()
    {
        $this->beConstructedWith('div');

        $this->addClass('class1');
        $this->render()->shouldEqual('<div class="class1"></div>');

        $this->addClass('class2');
        $this->render()->shouldEqual('<div class="class1 class2"></div>');

        $this->addClass('class3 class4');
        $this->render()->shouldEqual('<div class="class1 class2 class3 class4"></div>');

        $this->removeClass('class1 class2');
        $this->render()->shouldEqual('<div class="class3 class4"></div>');
    }

    public function it_should_render_div_with_attributes()
    {
        $this->beConstructedWith('div');

        $this->setAttribute('atr1', 'value');
        $this->render()->shouldEqual('<div atr1="value"></div>');

        $this->setAttribute('atr2', 'value');
        $this->render()->shouldEqual('<div atr1="value" atr2="value"></div>');
    }

    public function it_should_render_input()
    {
        $this->beConstructedWith('input', '', true);
        $this->render()->shouldEqual('<input>');
    }
}

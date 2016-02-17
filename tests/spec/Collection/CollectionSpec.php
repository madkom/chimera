<?php

namespace spec\Madkom\Chimera\Collection;

use Madkom\Chimera\Collection\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;
use Traversable;

/**
 * Class CollectionSpec
 * @package spec\Madkom\Chimera\Collection
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Collection
 */
class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    function it_can_add_elements()
    {
        $obj1 = new stdClass();
        $obj2 = new stdClass();
        $this->add($obj1)->shouldReturn(true);
        $this->add($obj2)->shouldReturn(true);
    }

    function it_can_remove_added_element()
    {
        $obj1 = new stdClass();
        $obj2 = new stdClass();
        $this->add($obj1)->shouldReturn(true);
        $this->add($obj2)->shouldReturn(true);
        $this->remove($obj1)->shouldReturn(true);
        $this->remove([])->shouldReturn(false);
        $this->contains($obj2)->shouldReturn(true);
        $this->remove($obj2)->shouldReturn(true);
        $this->contains($obj2)->shouldReturn(false);
    }

    function it_can_filter_elements()
    {
        $obj1 = new stdClass();
        $obj1->id = 1;
        $obj2 = new stdClass();
        $obj2->id = 2;
        $this->add($obj1)->shouldReturn(true);
        $this->add($obj2)->shouldReturn(true);
        $this->shouldHaveCount(2);

        $filtered = $this->filter(function (stdClass $obj) {
            return $obj->id == 1;
        });
        $filtered->shouldReturnAnInstanceOf(Collection::class);
        $filtered->shouldHaveCount(1);
    }

    function it_can_test_element_existance()
    {
        $obj1 = new stdClass();
        $obj1->id = 1;
        $this->add($obj1)->shouldReturn(true);

        $exists = $this->exists(function (stdClass $obj) {
            return $obj->id == 1;
        });
        $exists->shouldReturn(true);
    }

    function it_is_traversable()
    {
        $obj1 = new stdClass();
        $obj1->id = 1;
        $this->add($obj1)->shouldReturn(true);

        $iterator = $this->getIterator();
        $iterator->shouldHaveType(Traversable::class);

        $iterator[0]->id->shouldReturn(1);
    }
}

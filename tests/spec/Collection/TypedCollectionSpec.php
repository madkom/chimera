<?php

namespace spec\Madkom\Chimera\Collection;

use Madkom\Chimera\Collection\TypedCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;
use UnexpectedValueException;

/**
 * Class TypedCollectionSpec
 * @package spec\Madkom\Chimera\Collection
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin TypedCollection
 */
class TypedCollectionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(stdClass::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TypedCollection::class);
    }

    function it_can_add_only_stdClass_objects()
    {
        $obj1 = new stdClass();
        $obj2 = new stdClass();
        $this->add($obj1)->shouldReturn(true);
        $this->add($obj2)->shouldReturn(true);

        $date = new \DateTime();
        $this->shouldThrow(UnexpectedValueException::class)->during('add', [$date]);
    }

    function it_can_remove_stdClass_objects()
    {
        $obj1 = new stdClass();
        $obj2 = new stdClass();
        $this->add($obj1)->shouldReturn(true);
        $this->add($obj2)->shouldReturn(true);
        $this->remove($obj1)->shouldReturn(true);
        $this->remove($obj2)->shouldReturn(true);
    }
}

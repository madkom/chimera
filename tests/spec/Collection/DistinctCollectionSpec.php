<?php

namespace spec\Madkom\Chimera\Collection;

use Madkom\Chimera\Collection\DistinctCollection;
use DateTime;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RuntimeException;

/**
 * Class DistinctCollectionSpec
 * @package spec\Madkom\Chimera\Collection
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DistinctCollection
 */
class DistinctCollectionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(DateTime::class, 'getTimestamp');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DistinctCollection::class);
    }

    function it_can_add_unique_DateTime_object()
    {
        $date1 = new DateTime('yesterday');
        $date2 = new DateTime('now');
        $date3 = clone $date2;

        $this->add($date1)->shouldReturn(true);
        $this->add($date2)->shouldReturn(true);
        $this->shouldThrow(RuntimeException::class)->during('add', [$date3]);
    }
}

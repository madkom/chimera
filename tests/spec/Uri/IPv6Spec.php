<?php

namespace spec\Madkom\Chimera\Uri;

use Madkom\Chimera\Uri\IPv6;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class IPv6Spec
 * @package spec\Madkom\Chimera\Uri
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin IPv6
 */
class IPv6Spec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('::1');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(IPv6::class);
    }

    function it_can_retrieve_valid_address()
    {
        $this->getAddress()->shouldBeString();
    }

    function it_fails_on_invalid_address_instantiation()
    {
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['']);
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', [':::1']);
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['::abhg']);
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['256.0.0.1']);
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['127.0.0.1.0.5']);
    }
}

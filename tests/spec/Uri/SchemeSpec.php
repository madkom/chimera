<?php

namespace spec\Madkom\Chimera\Uri;

use Madkom\Chimera\Uri\Scheme;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use UnexpectedValueException;

/**
 * Class SchemeSpec
 * @package spec\Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Scheme
 */
class SchemeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('http');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Scheme::class);
    }

    function it_throws_exception_while_initialized_with_empty_string()
    {
        $this->shouldThrow(UnexpectedValueException::class)->during('__construct', ['']);
    }
}

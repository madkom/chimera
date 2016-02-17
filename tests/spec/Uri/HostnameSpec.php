<?php

namespace spec\Madkom\Chimera\Uri;

use Madkom\Chimera\Uri\Hostname;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HostnameSpec
 * @package spec\Madkom\Chimera\Uri
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Hostname
 */
class HostnameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('madkom.pl');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Hostname::class);
    }

    function it_retrieves_hostname_in_ascii_format()
    {
        $this->beConstructedWith('zażółć-gęślą-jaźń.pl');
        $this->getAddress()->shouldReturn('xn--za-gl-ja-w3a7psa2tqtgb10airva.pl');
    }

    function it_fails_on_invalid_address_instantiation()
    {
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['']);
        $this->shouldThrow(InvalidArgumentException::class)->during('__construct', ['host:invalid']);
    }
}

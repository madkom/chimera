<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\Uri;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UrlSpec
 * @package spec\Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Uri
 */
class UriSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('http://some.domain/path?query=true#fragment,1');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Uri::class);
    }

    function it_can_get_value_host_scheme_and_path()
    {
        $this->getScheme()->shouldReturn('http');
        $this->getHost()->shouldReturn('some.domain');
        $this->getPath()->shouldReturn('path');
    }
}

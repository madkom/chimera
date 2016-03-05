<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\License;
use Madkom\Uri\Uri;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LicenseSpec
 * @package spec\Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin License
 */
class LicenseSpec extends ObjectBehavior
{
    function let(Uri $uri)
    {
        $this->beConstructedWith('License name', $uri);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(License::class);
    }

    function it_can_retrieve_name_and_url(Uri $uri)
    {
        $name = 'License name';
        $this->beConstructedWith($name, $uri);
        $this->getName()->shouldReturn($name);
        $this->getUrl()->shouldReturn($uri);
    }
}

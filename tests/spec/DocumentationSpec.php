<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\Documentation;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DocumentationSpec
 * @package spec\Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Documentation
 */
class DocumentationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Title', 'Contents');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Documentation::class);
    }
}

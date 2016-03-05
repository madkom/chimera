<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\Definition;
use Madkom\Chimera\License;
use Madkom\Uri\Component\Authority\Host\Name;
use Madkom\Uri\Scheme\Scheme;
use Madkom\Uri\Uri;
use Madkom\Uri\UriTemplate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Traversable;

/**
 * Class DefinitionSpec
 * @package spec\Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Definition
 */
class DefinitionSpec extends ObjectBehavior
{
    function let(Scheme $httpScheme, License $license)
    {
        $httpScheme->toString()->willReturn('http');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Definition::class);
    }

    function it_can_set_information_properties(Scheme $httpScheme, License $license)
    {
        $title = 'API title';
        $this->setTitle($title);
        $this->getTitle()->shouldReturn($title);

        $description = 'API description';
        $this->setDescription($description);
        $this->getDescription()->shouldReturn($description);

        $version = '1.0';
        $this->setVersion($version);
        $this->getVersion()->shouldReturn($version);

        $host = new Name('host');
        $this->setHost($host);
        $this->getHost()->shouldReturn($host);

        $this->setPort(80);
        $this->getPort()->shouldReturn(80);

        $this->addScheme($httpScheme);
        $this->getSchemes()->shouldReturnAnInstanceOf(Traversable::class);

        $basePath = new UriTemplate('/api/{version}');
        $this->setBasePath($basePath);
        $this->getBasePath()->shouldReturn($basePath);

        $this->setLicense($license);
        $this->getLicense()->shouldReturn($license);
    }
}

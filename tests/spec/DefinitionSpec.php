<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\Definition;
use Madkom\Chimera\License;
use Madkom\Chimera\Uri\Hostname;
use Madkom\Chimera\Uri\Scheme;
use Madkom\Chimera\Uri\Template;
use Madkom\Chimera\Uri;
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
    function it_is_initializable()
    {
        $this->shouldHaveType(Definition::class);
    }

    function it_can_set_information_properties()
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

        $host = new Hostname('host');
        $this->setAddress($host);
        $this->getAddress()->shouldReturn($host);

        $this->setPort(80);
        $this->getPort()->shouldReturn(80);

        $schemes = ['http', 'https', 'ws', 'wss'];
        foreach ($schemes as $scheme) {
            $this->addScheme(new Scheme($scheme));
        }
        $this->getSchemes()->shouldReturnAnInstanceOf(Traversable::class);

        $basePath = new Template('/api/{version}');
        $this->setBasePath($basePath);
        $this->getBasePath()->shouldReturn($basePath);

        $licence = new License('MIT', new Uri('https://opensource.org/licenses/MIT'));
        $this->setLicense($licence);
        $this->getLicense()->shouldReturn($licence);
    }
}

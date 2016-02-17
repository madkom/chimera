<?php

namespace spec\Madkom\Chimera;

use Madkom\Chimera\Contact;
use Madkom\Chimera\Email;
use Madkom\Chimera\Uri;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ContactSpec
 * @package spec\Madkom\Chimera\ValueObject
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Contact
 */
class ContactSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Contact name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Contact::class);
    }

    function it_can_retrieve_name_url_and_email()
    {
        $name = 'Contact name';
        $url = new Uri('http://contact/url');
        $email = new Email('contact@email.nonexist');
        $this->beConstructedWith($name, $url, $email);
        $this->getName()->shouldReturn($name);
        $this->getUrl()->shouldReturn($url);
        $this->getEmail()->shouldReturn($email);
    }
}

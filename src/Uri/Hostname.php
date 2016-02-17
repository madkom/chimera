<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.02.16
 * Time: 08:45
 */
namespace Madkom\Chimera\Uri;

use InvalidArgumentException;
use TrueBV\Punycode;

/**
 * Class Hostname
 * @package Madkom\Chimera\Uri
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Hostname implements Address
{
    /**
     * @var string Holds hostname
     */
    protected $address;

    /**
     * Hostname constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->setAddress($address);
    }

    /**
     * Retrieves ASCII formatted hostname
     * @return string
     */
    public function getAddress() : string
    {
        return $this->address;
    }

    /**
     * Retrieves Unicode hostname
     * @return string
     */
    public function getUnicode() : string
    {
        return $this->getPunnycode()->decode($this->address);
    }

    /**
     * Sets valid hostname in ASCII format
     * @param string $address Host name to set
     */
    protected function setAddress(string $address)
    {
        if (empty($address)) {
            throw new InvalidArgumentException('Empty hostname given');
        }
        if (preg_match('/^((^[\s\.:\/])|([\s\.:\/]$)|(.*[\s:\/].*))$/', $address)) {
            throw new InvalidArgumentException("Invalid hostname, given: {$address}");
        }
        $punycode = new Punycode();
        $this->address = $punycode->encode($address);
    }

    protected function getPunnycode()
    {
        static $punnycode;
        if (!isset($punnycode)) {
            $punnycode = new Punycode();
        }

        return $punnycode;
    }
}

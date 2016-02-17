<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.02.16
 * Time: 07:56
 */
namespace Madkom\Chimera\Uri;

use InvalidArgumentException;

/**
 * Class IPv6
 * @package Madkom\Chimera\Uri
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class IPv6 implements Address
{
    /**
     * @var string Holds IPv6 address
     */
    protected $address;

    /**
     * IPv6 constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->setAddress($address);
    }

    /**
     * Retrieve IPv6 address
     * @return string
     */
    public function getAddress() : string
    {
        return $this->address;
    }

    /**
     * Sets IPv6 address if valid
     * @param string $address IPv6 address to set
     * @throws InvalidArgumentException
     */
    private function setAddress(string $address)
    {
        if (empty($address)) {
            throw new InvalidArgumentException('Empty IPv6 address given');
        }
        if (false === filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            throw new InvalidArgumentException("Invalid IPv6 address, given: {$address}");
        }
        $this->address = $address;
    }
}

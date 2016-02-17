<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 15:09
 */
namespace Madkom\Chimera;

use UnexpectedValueException;

/**
 * Class Email
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Email
{
    /**
     * @var string Email address
     */
    private $address;

    /**
     * Email constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->setAddress($address);
    }

    /**
     * Retrieve email address
     * @return string
     */
    public function getAddress() : string
    {
        return (string) $this->address;
    }

    /**
     * Sets email address
     * @param string $address
     * @throws UnexpectedValueException
     */
    private function setAddress(string $address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new UnexpectedValueException("Given email address {$address} is not valid.");
        }

        $this->address = $address;
    }
}

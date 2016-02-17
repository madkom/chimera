<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 12.02.16
 * Time: 12:29
 */
namespace Madkom\Chimera;

/**
 * Class NullEmail
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class NullEmail extends Email
{
    /**
     * NullEmail constructor.
     * @param string $address
     * @SuppressWarnings(PHPMD.UnusedFormalParameters)
     */
    public function __construct($address = null)
    {

    }

    /**
     * Retrieve email address
     * @return string
     */
    public function getAddress() : string
    {
        return (string) null;
    }
}

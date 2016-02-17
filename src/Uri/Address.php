<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.02.16
 * Time: 07:49
 */
namespace Madkom\Chimera\Uri;

/**
 * Interface Address
 * @package Madkom\Chimera\Uri
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
interface Address
{
    public function getAddress() : string;
}

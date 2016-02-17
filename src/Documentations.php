<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 13:49
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Collection\CustomTypedCollection;

/**
 * Class Documentations
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Documentations extends CustomTypedCollection
{
    /**
     * Retrieves collection type
     * @return string
     */
    protected function getType() : string
    {
        return Documentation::class;
    }
}

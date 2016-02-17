<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 13:38
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Collection\CustomDistinctCollection;

/**
 * Class Resources
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Resources extends CustomDistinctCollection
{
    /**
     * @return string
     */
    protected function getMethod() : string
    {
        return 'getUriTemplate';
    }

    /**
     * Retrieves collection type
     * @return string
     */
    protected function getType() : string
    {
        return Resource::class;
    }
}

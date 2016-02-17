<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 13:51
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Collection\CustomDistinctCollection;
use Madkom\Chimera\Uri\Scheme;

/**
 * Class Schemes
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class UriSchemes extends CustomDistinctCollection
{
    /**
     * @return string
     */
    protected function getMethod() : string
    {
        return 'getProtocol';
    }

    /**
     * Retrieves collection type
     * @return string
     */
    protected function getType() : string
    {
        return Scheme::class;
    }
}

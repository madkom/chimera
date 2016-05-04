<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 24.03.16
 * Time: 11:45
 */
namespace Madkom\Chimera\Factory;

use Madkom\Chimera\Entity\Type\Facet;

/**
 * Class FacetsFactory
 * @package Madkom\Chimera\Factory
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class FacetsFactory
{
    /**
     * @param int $minLength
     * @return Facet
     */
    public function createMinLengthFacet(int $minLength) : Facet
    {
        return new Facet\MinLength($minLength);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 30.03.16
 * Time: 13:54
 */
namespace Madkom\Chimera\Factory;

use Madkom\Chimera\Entity;

/**
 * Class EntityFactory
 * @package Madkom\Chimera\Factory
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class EntityFactory
{
    /**
     * @param string $name
     * @return Entity
     */
    public function createObjectEntity(string $name) : Entity
    {
        return new Entity($name, new Entity\Type\ObjectType());
    }

    /**
     * @param string $name
     * @param Entity\Type\Facet[] $additionalFacets
     * @return Entity
     */
    public function createStringEntity(string $name, array $additionalFacets = []) : Entity
    {
        return new Entity($name, new Entity\Type\StringType($additionalFacets));
    }
}

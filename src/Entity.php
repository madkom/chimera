<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 05.03.16
 * Time: 06:05
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Entity\Property;
use Madkom\Collection\CustomDistinctCollection;

/**
 * Class Entity
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Entity
{
    /**
     * @var string Holds type
     */
    protected $name;
    /**
     * @var CustomDistinctCollection Holds properties collection
     */
    protected $properties;

    /**
     * Type constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->properties = new class extends CustomDistinctCollection
        {
            /**
             * Retrieves property type
             * @return string
             */
            public function getType() : string
            {
                return Property::class;
            }

            /**
             * Retrieves property distinction method
             * @return string
             */
            public function getMethod() : string
            {
                return 'getName';
            }
        };
    }

    /**
     * Retrieve name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Adds property to collection
     * @param Property $property
     * @return bool
     */
    public function addProperty(Property $property) : bool
    {
        return $this->properties->add($property);
    }

    /**
     * Removes property from collection
     * @param Property $property
     * @return bool
     */
    public function removeProperty(Property $property) : bool
    {
        return $this->properties->remove($property);
    }
}

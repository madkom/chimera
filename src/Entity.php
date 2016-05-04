<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 05.03.16
 * Time: 06:05
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Entity\Property;
use Madkom\Chimera\Entity\Type;
use Madkom\Collection\CustomDistinctCollection;
use RuntimeException;

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
     * @var Type Holds entity type definition
     */
    protected $type;

    /**
     * Type constructor.
     * @param string $name
     * @param Type $type
     */
    public function __construct(string $name, Type $type)
    {
        $this->name = $name;
        $this->type = $type;
        if ($this->type->canHaveProperties()) {
            // @codingStandardsIgnoreStart
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
            // @codingStandardsIgnoreEnd
        }
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
     * @throws RuntimeException On non-property type
     */
    public function addProperty(Property $property) : bool
    {
        if (false === $this->type->canHaveProperties()) {
            throw new RuntimeException("Unable to add property to type: {$this->type}");
        }

        return $this->properties->add($property);
    }

    /**
     * Removes property from collection
     * @param Property $property
     * @return bool
     * @throws RuntimeException On non-property type
     */
    public function removeProperty(Property $property) : bool
    {
        if (false === $this->type->canHaveProperties()) {
            throw new RuntimeException("Unable to remove property from type: {$this->type}");
        }

        return $this->properties->remove($property);
    }

    /**
     * Retrieve entity type
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }
}

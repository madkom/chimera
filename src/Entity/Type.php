<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 22.03.16
 * Time: 15:02
 */
namespace Madkom\Chimera\Entity;

use IteratorIterator;
use Madkom\Chimera\Entity;
use Madkom\Chimera\Entity\Type\Facet;
use Madkom\Collection\CustomDistinctCollection;
use Traversable;

/**
 * Class Type
 * @package Madkom\Chimera\Entity
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
abstract class Type
{
    /**
     * @var CustomDistinctCollection|Facet[] Holds additional facets
     */
    protected $additionalFacets;

    /**
     * Type constructor.
     * @param Facet[] $additionalFacets
     */
    public function __construct(array $additionalFacets = [])
    {
        $this->additionalFacets = new class($additionalFacets) extends CustomDistinctCollection
        {
            /**
             * Retrieves distinction method
             * @return string
             */
            protected function getMethod() : string
            {
                return 'getName';
            }

            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Facet::class;
            }
        };
    }

    /**
     * Retrieve additional facets
     * @return Traversable
     */
    public function getAdditionalFacets() : Traversable
    {
        return new IteratorIterator($this->additionalFacets);
    }

    /**
     * Adds additional facet
     * @param Facet $facet
     * @return bool
     */
    public function addAdditionalFacet(Facet $facet) : bool
    {
        return $this->additionalFacets->add($facet);
    }

    /**
     * Removes additional facet
     * @param Facet $facet
     * @return bool
     */
    public function removeAdditionalFacet(Facet $facet) : bool
    {
        return $this->additionalFacets->remove($facet);
    }

    /**
     * Validates if type is valid
     * @param Entity $entity
     * @return bool
     */
    public function isValid(Entity $entity) : bool
    {
        foreach ($this->additionalFacets as $additionalFacet) {
            if (false === $additionalFacet->validate($entity)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if type can have properties
     * @return bool
     */
    public function canHaveProperties() : bool
    {
        return false;
    }
}

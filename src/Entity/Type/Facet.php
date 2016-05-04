<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 22.03.16
 * Time: 15:07
 */
namespace Madkom\Chimera\Entity\Type;

use Madkom\Chimera\Entity;
use Madkom\Chimera\Entity\Type;

/**
 * Class Facet
 * @package Madkom\Chimera\Entity\Type
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
abstract class Facet
{
    /**
     * Validates if entity is valid with facet
     * @param Entity $entity
     * @return bool
     */
    abstract public function validate(Entity $entity) : bool;

    /**
     * Retrieves facet name
     * @return string
     */
    abstract public function getName() : string;
}

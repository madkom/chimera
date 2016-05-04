<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 23.03.16
 * Time: 11:01
 */
namespace Madkom\Chimera\Entity\Type\Facet;

use Madkom\Chimera\Entity;
use Madkom\Chimera\Entity\Type\Facet;
use Madkom\RegEx\Pattern;

/**
 * Class StringPattern
 * @package Madkom\Chimera\Entity\Type\Facet
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class StringPattern extends Facet
{

    /**
     * @var Pattern Holds compiled Regex pattern
     */
    protected $pattern;

    /**
     * StringPattern constructor.
     * @param Pattern $pattern
     */
    public function __construct(Pattern $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Validates if entity is valid with facet
     * @param Entity $entity
     * @return bool
     */
    public function validate(Entity $entity) : bool
    {
        // TODO: Implement validate() method.
    }

    /**
     * Retrieves facet name
     * @return string
     */
    public function getName() : string
    {
        return 'pattern';
    }
}
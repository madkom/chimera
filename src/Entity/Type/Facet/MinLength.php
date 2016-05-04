<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 24.03.16
 * Time: 11:50
 */
namespace Madkom\Chimera\Entity\Type\Facet;

use InvalidArgumentException;
use Madkom\Chimera\Entity;
use Madkom\Chimera\Entity\Type\Facet;

/**
 * Class MinLength
 * @package Madkom\Chimera\Entity\Type\Facet
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class MinLength extends Facet
{
    /**
     * @var int Holds minimal type value length
     */
    protected $minLength;

    /**
     * StringMinLength constructor.
     * @param int $minLength
     * @throws InvalidArgumentException On negative minLength value
     */
    public function __construct(int $minLength = 0)
    {
        if ($minLength < 0) {
            throw new InvalidArgumentException("Minimal length in string type facet is invalid, given: {$minLength}");
        }
        $this->minLength = $minLength;
    }

    /**
     * Validates if entity is valid with facet
     * @param Entity $entity
     * @return bool
     */
    public function validate(Entity $entity) : bool
    {
        if ($entity instanceof Entity\Type\StringType) {

        }
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return 'minLength';
    }
}

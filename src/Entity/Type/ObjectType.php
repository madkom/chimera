<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 24.03.16
 * Time: 13:24
 */
namespace Madkom\Chimera\Entity\Type;

use Madkom\Chimera\Entity\Type;

/**
 * Class ObjectType
 * @package Madkom\Chimera\Entity\Type
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class ObjectType extends Type
{
    /**
     * @return bool
     */
    public function canHaveProperties() : bool
    {
        return true;
    }
}

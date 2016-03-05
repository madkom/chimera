<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 05.03.16
 * Time: 06:06
 */
namespace Madkom\Chimera\Entity;

/**
 * Class Property
 * @package Madkom\Chimera\Entity
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Property
{
    /**
     * @var string Holds property name
     */
    protected $name;

    /**
     * Property constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Retrieve property name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

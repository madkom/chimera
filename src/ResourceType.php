<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 22.03.16
 * Time: 14:48
 */
namespace Madkom\Chimera;

/**
 * Class ResourceType
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class ResourceType
{
    /**
     * @var string Holds resource type name
     */
    private $name;
    /**
     * @var string Holds resource type usage info
     */
    private $usage = '';
    /**
     * @var string Holds description info
     */
    private $description = '';

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Retrieve usage info
     * @return string
     */
    public function getUsage() : string
    {
        return $this->usage;
    }

    /**
     * Sets usage info
     * @param string $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

    /**
     * Retrieve description info
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Sets description info
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

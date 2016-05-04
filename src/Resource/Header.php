<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 04.03.16
 * Time: 10:18
 */
namespace Madkom\Chimera\Resource;

use Madkom\Collection\DistinctCollection;
use Madkom\RegEx\Pattern;

/**
 * Class Header
 * @package Madkom\Chimera\Resource
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Header
{
    /**
     * @var string Holds information about header type: "string", "array"
     */
    protected $type;
    /**
     * @var string Holds header name
     */
    protected $name;
    /**
     * @var string Holds header description
     */
    protected $description;
    /**
     * @var array|string[] Holds header examples
     */
    protected $examples = [];
    /**
     * @var bool Holds information about maturity
     */
    protected $required;
    /**
     * @var Pattern Holds information about examples pattern
     */
    protected $pattern;
    /**
     * @var HeaderItems Holds information about examples type and pattern
     */
    protected $items;

    /**
     * Header constructor.
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, string $type = 'string')
    {
        $this->name = ucwords($name, '-');
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Retrieve description
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Sets description
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Retrieve examples
     * @return array
     */
    public function getExamples() : array
    {
        return $this->examples;
    }

    /**
     * Adds example
     * @param string $example
     */
    public function addExample(string $example)
    {
        $this->examples[] = $example;
    }

    /**
     * Checks if is required
     * @return boolean
     */
    public function isRequired() : bool
    {
        return $this->required;
    }

    /**
     * Sets is required
     * @param boolean $required
     */
    public function setRequired(bool $required)
    {
        $this->required = $required;
    }

    /**
     * Retrieve pattern
     * @return Pattern
     */
    public function getPattern() : Pattern
    {
        return $this->pattern;
    }

    /**
     * Sets pattern
     * @param Pattern $pattern
     */
    public function setPattern(Pattern $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Retrieve header items spec
     * @return HeaderItems
     */
    public function getItems() : HeaderItems
    {
        return $this->items;
    }

    /**
     * Sets header items spec
     * @param HeaderItems $items
     */
    public function setItems(HeaderItems $items)
    {
        $this->items = $items;
    }
}

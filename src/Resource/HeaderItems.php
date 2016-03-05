<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 04.03.16
 * Time: 10:41
 */
namespace Madkom\Chimera\Resource;

use Madkom\RegEx\Pattern;

/**
 * Class HeaderItem
 * @package Madkom\Chimera\Resource\Header
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class HeaderItems
{
    /**
     * @var string Holds information about type
     */
    protected $type;
    /**
     * @var Pattern Holds item value pattern
     */
    protected $pattern;

    /**
     * HeaderItems constructor.
     * @param string $type
     * @param Pattern|null $pattern
     */
    public function __construct(string $type, Pattern $pattern = null)
    {
        $this->type = $type;
        $this->pattern = $pattern;
    }

    /**
     * Retrieve pattern
     * @return Pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Sets pattern
     * @param Pattern $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 15.02.16
 * Time: 14:27
 */
namespace Madkom\Chimera\Collection;

class TypedCollection extends CustomTypedCollection
{
    /**
     * @var string Collection generic type
     */
    protected $type;

    /**
     * GenericCollection constructor.
     * @param string $type
     * @param array $elements
     */
    public function __construct(string $type, array $elements = [])
    {
        $this->type = $type;
        parent::__construct($elements);
    }

    /**
     * @return string
     */
    protected function getType() : string
    {
        return $this->type;
    }
}

<?php
namespace Brzuchal;

use ArrayObject;

class Base
{
    protected $anonymous;

    public function __construct()
    {
        $this->anonymous = new class extends ArrayObject
        {
            public function __construct()
            {
                parent::__construct(['a' => 1, 'b' => 2]);
            }
        };
    }
}

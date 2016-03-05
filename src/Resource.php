<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 13:08
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Resource\Method;
use Madkom\Collection\CustomDistinctCollection;
use Madkom\Uri\Uri;
use Madkom\Uri\UriTemplate;

/**
 * Class Resource
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Resource
{
    /**
     * @var UriTemplate
     */
    private $uriTemplate;
    /**
     * @var CustomDistinctCollection
     */
    protected $methods;

    public function __construct(UriTemplate $uriTemplate, array $methods = [])
    {
        $this->uriTemplate = $uriTemplate;
        $this->methods = new class($methods) extends CustomDistinctCollection
        {
            /**
             * Retrieve distinction method name
             * @return string
             */
            protected function getMethod() : string
            {
                return 'getName';
            }

            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Method::class;
            }
        };
    }

    public function getUriTemplate() : UriTemplate
    {
        return $this->uriTemplate;
    }

    public function getUri() : Uri
    {
        $this->uriTemplate->expand();
        
    }
}

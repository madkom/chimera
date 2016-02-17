<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 13:08
 */
namespace Madkom\Chimera;

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

    public function __construct(UriTemplate $uriTemplate)
    {
        $this->uriTemplate = $uriTemplate;
    }

    public function getUriTemplate() : UriTemplate
    {
        return $this->uriTemplate;
    }
}

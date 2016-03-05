<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 14:11
 */
namespace Madkom\Chimera;

use Madkom\Uri\Uri;

/**
 * Class License
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class License
{
    /**
     * @var string The license name used for the API
     */
    private $name;
    /**
     * @var Uri A URL to the license used for the API
     */
    private $url;

    /**
     * License constructor.
     * @param string $name The license name used for the API
     * @param Uri|null $url A URL to the license used for the API
     */
    public function __construct(string $name, Uri $url = null)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Retrieve the license name used for the API
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Retrieve a URL to the license used for the API
     * @return Uri
     */
    public function getUrl() : Uri
    {
        return $this->url;
    }
}

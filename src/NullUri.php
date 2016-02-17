<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 12.02.16
 * Time: 12:57
 */
namespace Madkom\Chimera;

/**
 * Class NullUrl
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class NullUri extends Uri
{
    /**
     * NullUrl constructor.
     * @param string|null $uri
     */
    public function __construct(string $uri = null)
    {

    }

    /**
     * @return string
     */
    public function getUri() : string
    {
        return (string) null;
    }

    /**
     * @return string
     */
    public function getHost() : string
    {
        return (string) null;
    }

    /**
     * @return string
     */
    public function getScheme() : string
    {
        return (string) null;
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return (string) null;
    }
}

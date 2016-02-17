<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 15:08
 */
namespace Madkom\Chimera;

use League\Url\Url as LeagueUrl;

/**
 * Class Uri
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Uri
{
    /**
     * @var string
     */
    private $uri;

    /**
     * Url constructor.
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        $this->getUrl();
    }

    /**
     * Retrieve url
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }

    /**
     * Retrieve host info
     * @return string
     */
    public function getHost() : string
    {
        return (string) $this->getUrl()->getHost();
    }

    /**
     * Retrieve scheme protocol
     * @return string
     */
    public function getScheme() : string
    {
        return (string) $this->getUrl()->getScheme();
    }

    /**
     * Retrieve path info
     * @return string
     */
    public function getPath() : string
    {
        return (string) $this->getUrl()->getPath();
    }

    /**
     * @return LeagueUrl
     */
    private function getUrl() : LeagueUrl
    {
        static $url = [];
        if (!array_key_exists($this->uri, $url)) {
            $leagueUrl = LeagueUrl::createFromUrl($this->uri);
            $this->uri = (string) $leagueUrl;
            $url[$this->uri] = $leagueUrl;
        }

        return $url[$this->uri];
    }
}

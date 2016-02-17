<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 12.02.16
 * Time: 13:33
 */
namespace Madkom\Chimera;

/**
 * Class Documentation
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Documentation
{
    /**
     * @var string Provides documentation title
     */
    private $title;
    /**
     * @var string Provides documentation content
     */
    private $content;

    /**
     * Documentation constructor.
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Retrieve documentation title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Retrieve documentation content
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

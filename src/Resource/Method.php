<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 01.03.16
 * Time: 17:12
 */
namespace Madkom\Chimera\Resource;

use IteratorIterator;
use Madkom\Collection\CustomDistinctCollection;

/**
 * Class Method
 * @package Madkom\Chimera\Resource
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Method
{
    /**
     * @var string Holds method name
     */
    protected $name;
    /**
     * @var string Holds method description
     */
    protected $description;
    /**
     * @var CustomDistinctCollection
     */
    protected $headers;
    /**
     * @var string Holds body
     */
    protected $body;

    /**
     * Method constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = strtoupper($name);
        // @codingStandardsIgnoreStart
        $this->headers = new class extends CustomDistinctCollection
        {
            /**
             * Retrieve collection item type
             * @return string
             */
            public function getType() : string
            {
                return Header::class;
            }

            /**
             * Retrieve collection item distinction method
             * @return string
             */
            public function getMethod() : string
            {
                return 'getName';
            }
        };
        // @codingStandardsIgnoreEnd
    }

    /**
     * Checks if HTTP Method is safe: GET, HEAD, OPTIONS
     * @return bool
     */
    public function isSafe() : bool
    {
        return in_array($this->getName(), ['GET', 'HEAD', 'OPTIONS']);
    }

    /**
     * Retrieve HTTP Method name
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Retrieve Method description
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Retrieve Headers collection iterator
     * @return IteratorIterator
     */
    public function getHeaders() : IteratorIterator
    {
        return $this->headers->getIterator();
    }

    /**
     * Adds header
     * @param Header $header
     * @return bool
     */
    public function addHeader(Header $header) : bool
    {
        return $this->headers->add($header);
    }

    /**
     * Removes header
     * @param Header $header
     * @return bool
     */
    public function removeHeader(Header $header) : bool
    {
        return $this->headers->remove($header);
    }

    /**
     * Retrieve body
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }

    /**
     * Sets body
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }
}

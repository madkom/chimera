<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 16.02.16
 * Time: 05:44
 */
namespace Madkom\Chimera\Uri;

use UnexpectedValueException;

/**
 * Class Scheme
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Scheme
{
    const SCHEME_HTTP = 'http';
    const SCHEME_HTTPS = 'https';
    const SCHEME_WS = 'ws';
    const SCHEME_WSS = 'wss';
    /**
     * @var string[] The transfer protocol supported schemes of the API
     */
    protected static $supportedSchemes = [
        self::SCHEME_HTTP,
        self::SCHEME_HTTPS,
        self::SCHEME_WS,
        self::SCHEME_WSS,
    ];
    /**
     * @var string
     */
    private $protocol;

    /**
     * Scheme constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->setProtocol($value);
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    protected function setProtocol($protocol)
    {
        if (empty($protocol)) {
            throw new UnexpectedValueException('Empty scheme value is not allowed, expected: ' .
                implode(', ', self::$supportedSchemes));
        }
        if (!in_array($protocol, self::$supportedSchemes)) {
            throw new UnexpectedValueException("Unsupported scheme value, given: {$protocol}, expected: " .
                implode(', ', self::$supportedSchemes));
        }
        $this->protocol = $protocol;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 14:19
 */
namespace Madkom\Chimera;

/**
 * Class Contact
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Contact
{
    /**
     * @var string The identifying name of the contact person/organization
     */
    private $name;
    /**
     * @var Uri The URL pointing to the contact information
     */
    private $url;
    /**
     * @var Email The email address of the contact person/organization
     */
    private $email;

    /**
     * Contact constructor.
     * @param string $name The identifying name of the contact person/organization
     * @param Uri|null $url The URL pointing to the contact information
     * @param Email $email The email address of the contact person/organization
     */
    public function __construct(string $name, Uri $url = null, Email $email = null)
    {
        $this->name = $name;
        $this->url = $url ?? new NullUri();
        $this->email = $email ?? new NullEmail();
    }

    /**
     * Retrieve the identifying name of the contact person/organization
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Retrieve the URL pointing to the contact information
     * @return Uri|null
     */
    public function getUrl() : Uri
    {
        return $this->url;
    }

    /**
     * Retrieve the email address of the contact person/organization
     * @return Email
     */
    public function getEmail() : Email
    {
        return $this->email;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 12:05
 */
namespace Madkom\Chimera;

use Madkom\Chimera\Uri\Address;
use Madkom\Chimera\Uri\Scheme;
use Madkom\Chimera\Uri\Template;
use IteratorIterator;

/**
 * Class Definition
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Definition
{
    /**
     * @var string Short API name
     */
    protected $title = '';
    /**
     * @var string A longer human-friendly description of the API
     */
    protected $description = '';
    /**
     * @var string Provides the version of the application API
     */
    protected $version = '';
    /**
     * @var License License information for the exposed API
     */
    protected $license;
    /**
     * @var Address Name or IP of host serving the API
     */
    protected $address;
    /**
     * @var int Port number of host serving the API
     */
    protected $port = 80;
    /**
     * @var UriSchemes|Scheme[] The transfer protocol of the API: "http", "https", "ws", "wss"
     */
    protected $schemes;
    /**
     * @var Template A RFC 6570 URI Template that's to be used as the base of all the resources' URIs
     */
    protected $basePath;
    /**
     * @var Resources|Resource[] The API resources
     */
    protected $resources;
    /**
     * @var Contact Contact information for the exposed API
     */
    protected $contact;
    /**
     * @var Documentations|Documentation[] Additional overall documentation for the API
     */
    protected $documentation = [];

    /**
     * Definition constructor.
     */
    final public function __construct()
    {
        $this->schemes = new UriSchemes();
        $this->resources = new Resources();
        $this->documentation = new Documentations();
    }

    /**
     * Retrieve short API name
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets short API name
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Retrieve longer human-friendly description of the API
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets longer human-friendly description of the API
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Retrieve the version of the application API
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the version of the application API
     * @param string $version
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * Retrieves name or IP of host serving the API. May contain port number in format: [host]:[port]
     * @return Address
     */
    public function getAddress() : Address
    {
        return $this->address;
    }

    /**
     * Sets name or IP of host serving the API. May contain port number in format: [host]:[port]
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Retrieve port number
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Sets API host port
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * Retrieve transfer protocol schemes
     * @return Scheme[]
     */
    public function getSchemes()
    {
        return new IteratorIterator($this->schemes);
    }

    /**
     * Add the transfer protocol of the API from supported ones {@see self::$supportedSchemes}
     * @param Scheme $scheme
     */
    public function addScheme(Scheme $scheme)
    {
        $this->schemes->add($scheme);
    }

    /**
     * Remove the transfer protocol of the API
     * @param Scheme $scheme
     */
    public function removeScheme(Scheme $scheme)
    {
        $this->schemes->remove($scheme);
    }

    /**
     * Checks if the transfer protocol of the API already exists
     * @param Scheme $scheme
     * @return bool
     */
    public function hasScheme(Scheme $scheme)
    {
        return $this->schemes->contains($scheme);
    }

    /**
     * Retrieve URI Template based on RFC 6570 that's to be used as the base of all the resources' URIs
     * @return Template
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Sets URI Template based on RFC 6570 that's to be used as the base of all the resources' URIs
     * @param Template $basePath
     */
    public function setBasePath(Template $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Retrieve additional documentations
     * @return Documentation[]
     */
    public function getDocumentation()
    {
        return new IteratorIterator($this->documentation);
    }

    /**
     * Add new documentation
     * @param Documentation $documentation
     */
    public function addDocumentation(Documentation $documentation)
    {
        $this->documentation->add($documentation);
    }

    /**
     * Removes documentation
     * @param Documentation $documentation
     */
    public function removeDocumentation(Documentation $documentation)
    {
        $this->documentation->remove($documentation);
    }

    /**
     * Retrieve license info
     * @return License
     */
    public function getLicense() : License
    {
        return $this->license;
    }

    /**
     * Sets license info
     * @param License $license
     */
    public function setLicense(License $license)
    {
        $this->license = $license;
    }

    /**
     * @return Contact
     */
    public function getContact() : Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Retrieves resources
     * @return Resource[]
     */
    public function getResources()
    {
        return new IteratorIterator($this->resources);
    }

    /**
     * Add new resource to collection
     * @param Resource $resource
     */
    public function addResource(Resource $resource)
    {
        $this->resources->add($resource);
    }

    /**
     * Removes resource from collection
     * @param Resource $resource
     */
    public function removeResource(Resource $resource)
    {
        $this->resources->remove($resource);
    }

    /**
     * Checks if resource already included
     * @param Resource $resource
     * @return bool
     */
    public function hasResource(Resource $resource) : bool
    {
        return $this->resources->contains($resource);
    }
}
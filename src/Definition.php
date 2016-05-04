<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 12:05
 */
namespace Madkom\Chimera;

use IteratorIterator;
use Madkom\Collection\CustomDistinctCollection;
use Madkom\Collection\CustomTypedCollection;
use Madkom\Uri\Component\Authority\Host;
use Madkom\Uri\Scheme\Scheme;
use Madkom\Uri\UriTemplate;

/**
 * Class Definition
 * @package Madkom\Chimera
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Definition
{
    /**
     * @var string Holds short API name
     */
    protected $title = '';
    /**
     * @var string Holds longer human-friendly description of the API
     */
    protected $description = '';
    /**
     * @var string Holds the version of the application API
     */
    protected $version = '';
    /**
     * @var License Holds license information for the exposed API
     */
    protected $license;
    /**
     * @var Host Holds name or IP of host serving the API
     */
    protected $host;
    /**
     * @var int Holds port number of host serving the API
     */
    protected $port = 80;
    /**
     * @var CustomDistinctCollection|Scheme[] Holds the transfer protocol of the API: "http", "https", "ws", "wss"
     */
    protected $schemes;
    /**
     * @var UriTemplate Holds a RFC 6570 URI Template that's to be used as the base of all the resources' URIs
     */
    protected $basePath;
    /**
     * @var CustomDistinctCollection|Resource[] Holds the API resources
     */
    protected $resources;
    /**
     * @var Contact Holds contact information for the exposed API
     */
    protected $contact;
    /**
     * @var CustomTypedCollection|Documentation[] Hold additional overall documentation for the API
     */
    protected $documentation;
    /**
     * @var CustomDistinctCollection|Entity[] Holds entities
     */
    protected $entities;

    /**
     * Definition constructor.
     */
    final public function __construct()
    {
        // @codingStandardsIgnoreStart
        $this->schemes = new class() extends CustomDistinctCollection
        {
            /**
             * Retrieves distinction method
             * @return string
             */
            protected function getMethod() : string
            {
                return 'toString';
            }

            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Scheme::class;
            }
        };
        $this->resources = new class() extends CustomDistinctCollection
        {
            /**
             * Retrieves distinction method
             * @return string
             */
            protected function getMethod() : string
            {
                return 'getUriTemplate';
            }

            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Resource::class;
            }
        };
        $this->documentation = new class() extends CustomTypedCollection
        {
            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Documentation::class;
            }
        };
        $this->entities = new class extends CustomDistinctCollection
        {
            /**
             * Retrieve type class
             * @return string
             */
            public function getType() : string
            {
                return Entity::class;
            }

            /**
             * Retrieve type distinction method
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
     * Retrieve short API name
     * @return string
     */
    public function getTitle() : string
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
    public function getDescription() : string
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
    public function getVersion() : string
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
     * @return Host
     */
    public function getHost() : Host
    {
        return $this->host;
    }

    /**
     * Sets name or IP of host serving the API. May contain port number in format: [host]:[port]
     * @param Host $host
     */
    public function setHost(Host $host)
    {
        $this->host = $host;
    }

    /**
     * Retrieve port number
     * @return int
     */
    public function getPort() : int
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
     * @return IteratorIterator|Scheme[]
     */
    public function getSchemes() : IteratorIterator
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
     * @return UriTemplate
     */
    public function getBasePath() : UriTemplate
    {
        return $this->basePath;
    }

    /**
     * Sets URI Template based on RFC 6570 that's to be used as the base of all the resources' URIs
     * @param UriTemplate $basePath
     */
    public function setBasePath(UriTemplate $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Retrieve additional documentations
     * @return IteratorIterator|Documentation[]
     */
    public function getDocumentation() : IteratorIterator
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
     * @return IteratorIterator|Resource[]
     */
    public function getResources() : IteratorIterator
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

    /**
     * Get entities
     * @return IteratorIterator
     */
    public function getEntities() : IteratorIterator
    {
        return new IteratorIterator($this->entities);
    }

    /**
     * Adds entity to collection
     * @param Entity $entity
     * @return bool
     */
    public function addEntity(Entity $entity) : bool
    {
        return $this->entities->add($entity);
    }

    /**
     * Remove entity from collection
     * @param Entity $entity
     * @return bool
     */
    public function removeEntity(Entity $entity) : bool
    {
        return $this->entities->remove($entity);
    }

    /**
     * Checks if entity already exists
     * @param Entity $entity
     * @return bool
     */
    public function hasEntity(Entity $entity) : bool
    {
        return $this->entities->contains($entity);
    }
}

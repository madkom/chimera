<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 11.02.16
 * Time: 13:52
 */

require_once 'vendor/autoload.php';

use Madkom\Chimera\Definition;
use Madkom\Chimera\Contact;
use Madkom\Chimera\Documentation;
use Madkom\Chimera\Email;
use Madkom\Chimera\License;
use Madkom\Chimera\Resource;
use Madkom\Chimera\Entity;
use Madkom\Uri\UriFactory;
use Madkom\Uri\UriTemplate;

$definition = new Definition();
$uriFactory = new UriFactory();

$definition->setTitle('Sample non-existent API');
$definition->setVersion('1.0');
$definition->setLicense(new License('MIT', $uriFactory->createUri('https://opensource.org/licenses/MIT')));

$usage = <<<EOF
# Usage

Sample text
EOF;
$definition->addDocumentation(new Documentation('Usage', $usage));

$definition->setContact(new Contact('Michał Brzuchalski', $uriFactory->createUri('http://brzuchalski.com'), new Email('michal@brzuchalski.com')));

$get = new Resource\Method('get');
$get->addHeader(new Resource\Header('x-version'));
$get->setDescription('Get Users collection');

$post = new Resource\Method('post');
$post->addHeader(new Resource\Header('Content-Type'));
$post->setDescription('Add new User');

$resource = new Resource(new UriTemplate('/users'), [$get, $post]);
$definition->addResource($resource);


$userType = new Entity('User');
$userType->addProperty(new Entity\Property('id'));
$userType->addProperty(new Entity\Property('name'));
$userType->addProperty(new Entity\Property('email'));
$definition->addType($userType);

dump($definition);

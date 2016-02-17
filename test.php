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
use Madkom\Chimera\Uri\Hostname;
use Madkom\Chimera\Uri\Scheme;
use Madkom\Chimera\Uri\Template;
use Madkom\Chimera\Uri;

$definition = new Definition();

$definition->setTitle('Sample non-existent API');
$definition->setVersion('1.0');
$definition->setLicense(new License('MIT', new Uri('https://opensource.org/licenses/MIT')));

$definition->setAddress(new Hostname('kukółka.localhost'));
$definition->setPort(8888);
$definition->setBasePath(new Template('/api/{version}/'));
$definition->addScheme(new Scheme('http'));
$definition->addScheme(new Scheme('https'));

$usage = <<<EOF
# Usage

Sample text
EOF;
$definition->addDocumentation(new Documentation('Usage', $usage));

$definition->setContact(new Contact('Michał Brzuchalski', new Uri('brzuchalski.com'), new Email('michal@brzuchalski.com')));

dump($definition);

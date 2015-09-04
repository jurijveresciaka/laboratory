<?php

namespace JurijVeresciaka\Laboratory\Tests\Symfony\Component\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContainerBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
        $loader->load('services.yml');

        $person = new Person(
            'Jurij',
            'Veresciaka',
            new CreditCard('123456789')
        );

        $this->assertEquals($person, $container->get('person'));
    }
}

<?php

namespace JurijVeresciaka\Laboratory\Tests\Symfony\Component\Config;

use JurijVeresciaka\Laboratory\Symfony\Component\Config\CustomConfiguration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

class ProcessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Processor
     */
    protected $processor;

    /**
     * @var CustomConfiguration
     */
    protected $customConfiguration;

    protected function setUp()
    {
        $this->processor = new Processor();
        $this->customConfiguration = new CustomConfiguration();
    }

    /**
     * @param string $yamlContent
     * @param array $expectedOutputList
     *
     * @dataProvider providerProcessConfiguration
     */
    public function testProcessConfiguration($yamlContent, array $expectedOutputList)
    {
        $this->assertEquals(
            $expectedOutputList,
            $this->processor->processConfiguration(
                $this->customConfiguration,
                array(Yaml::parse($yamlContent))
            )
        );
    }

    public function providerProcessConfiguration()
    {
        return array(
            array(
                <<<EOT
title: 'PHP'
color: 'white'
code: '111-2222'
numbers:
    - one
    - two
    - three
EOT
            ,
                array(
                    'title' => 'PHP',
                    'color' => 'white',
                    'code' => '111-2222',
                    'numbers' => array('one', 'two', 'three')
                ),
            ),
        );
    }

    /**
     * @param string $yamlContent
     *
     * @dataProvider providerProcessConfiguration_invalid_configuration
     *
     * @expectedException Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testProcessConfiguration_invalid_configuration($yamlContent)
    {
        $this->processor->processConfiguration(
            $this->customConfiguration,
            array(Yaml::parse($yamlContent))
        );
    }

    public function providerProcessConfiguration_invalid_configuration()
    {
        return array(
            array(
                // empty title
                <<<EOT
title: ''
color: 'white'
code: '111-2222'
numbers:
    - one
    - two
    - three
EOT
            ,
                // invalid number format
                <<<EOT
title: ''
color: 'white'
code: '111-2222'
numbers:
    - one
    - two
    - three
    - invalid_
EOT
            ,
            ),
        );
    }
}

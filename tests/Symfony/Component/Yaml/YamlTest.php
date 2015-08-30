<?php

namespace JurijVeresciaka\Laboratory\Tests\Symfony\Component\Yaml;

use Symfony\Component\Yaml\Yaml;

class YamlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $yamlContent
     * @param array|null $expectedOutputList
     *
     * @dataProvider providerParse
     */
    public function testParse($yamlContent, $expectedOutputList)
    {
        $this->assertEquals(
            $expectedOutputList,
            Yaml::parse($yamlContent)
        );
    }

    public function providerParse()
    {
        return array(
            array(
                <<<EOT
a_b_c: 'a b c'
'a b c': a_b_c
'boolean': true
'date': 2015-08-29
'date string': '2015-08-29'
'array':
    - a
    - b
'integer': 15
'float': 9.99
EOT
            ,
                array(
                    'a_b_c' => 'a b c',
                    'a b c' => 'a_b_c',
                    'boolean' => true,
                    'date' => 1440806400,
                    'date string' => '2015-08-29',
                    'array' => array('a', 'b'),
                    'integer' => 15,
                    'float' => 9.99,
                ),
            ),
            array(
                '',
                null,
            )
        );
    }

    /**
     * @expectedException Symfony\Component\Yaml\Exception\ParseException
     */
    public function testParse_invalid_yaml_content()
    {
        Yaml::parse(
            <<<EOT
a 'a'
b: 'b'
EOT
        );

        $this->assertEquals(true, true);
    }
}

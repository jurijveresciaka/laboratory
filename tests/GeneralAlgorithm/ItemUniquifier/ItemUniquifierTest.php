<?php

namespace JurijVeresciaka\Laboratory\Tests\ItemUniquifier;

use JurijVeresciaka\Laboratory\GeneralAlgorithm\ItemUniquifier\ItemUniquifier;

class ItemUniquifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ItemUniquifier
     */
    protected $itemUniquifier;

    protected function setUp()
    {
        $this->itemUniquifier = new ItemUniquifier();
    }

    /**
     * @param string[] $expectedUniquifiedItemList
     * @param string $itemList
     *
     * @dataProvider providerUniquify
     */
    public function testUniquify($expectedUniquifiedItemList, $itemList)
    {
        $this->assertEquals(
            $expectedUniquifiedItemList,
            $this->itemUniquifier->uniquify($itemList)
        );
    }

    public function providerUniquify()
    {
        return array(
            array(
                array('1', '2', '3', '5'),
                array('1', '2', '3', '5'),
            ),
            array(
                array('1_1', '2_1', '2', '1_3', '2_3'),
                array('1', '1', '2', '3', '3'),
            ),
            array(
                array('1', '1_2', '2_2', '3'),
                array('1', '2', '2', '3'),
            ),
        );
    }
}

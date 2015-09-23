<?php

namespace JurijVeresciaka\Laboratory\Tests\ItemUniquifier;

use JurijVeresciaka\Laboratory\GeneralAlgorithm\ItemUniquifier\ItemUniquifierOne;
use JurijVeresciaka\Laboratory\GeneralAlgorithm\ItemUniquifier\ItemUniquifierTwo;

class ItemUniquifierTwoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ItemUniquifierOne
     */
    protected $itemUniquifier;

    protected function setUp()
    {
        $this->itemUniquifier = new ItemUniquifierTwo();
    }

    /**
     * @param string[] $expectedUniquifiedItemList
     * @param string[] $itemList
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
                array('1', '1_2', '2', '3', '3_2'),
                array('1', '1', '2', '3', '3'),
            ),
            array(
                array('1', '2', '2_2', '3'),
                array('1', '2', '2', '3'),
            ),
        );
    }
}

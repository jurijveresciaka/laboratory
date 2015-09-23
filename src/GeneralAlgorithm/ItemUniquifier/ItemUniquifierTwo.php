<?php

namespace JurijVeresciaka\Laboratory\GeneralAlgorithm\ItemUniquifier;

class ItemUniquifierTwo
{
    /**
     * @param string[] $itemList
     *
     * @return string[]
     */
    public function uniquify($itemList)
    {
        $itemCountList = array();

        $uniquifiedItemList = array();

        foreach ($itemList as $item) {
            if (!isset($itemCountList[$item])) {
                $itemCountList[$item] = 1;
            } else {
                $itemCountList[$item] += 1;
            }

            $uniquifiedItemList[] = $itemCountList[$item] > 1 ? $item . '_' . $itemCountList[$item] : $item;
        }

        return $uniquifiedItemList;
    }
}

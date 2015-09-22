<?php

namespace JurijVeresciaka\Laboratory\GeneralAlgorithm\ItemUniquifier;

class ItemUniquifier
{
    /**
     * @param string[] $itemList
     *
     * @return string[]
     */
    public function uniquify($itemList)
    {
        $itemCountList = array();
        $itemIndexList = array();

        foreach ($itemList as $item) {
            if (!isset($itemCountList[$item])) {
                $itemCountList[$item] = 1;
            } else {
                $itemCountList[$item] += 1;
            }

            $itemIndexList[] = $itemCountList[$item];
        }

        $uniquifiedItemList = array();

        foreach ($itemList as $index => $item) {
            $uniquifiedItemList[] = $itemCountList[$item] > 1 ? $itemIndexList[$index] . '_' . $item : $item;
        }

        return $uniquifiedItemList;
    }
}

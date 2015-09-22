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
            if ($itemCountList[$item] > 1) {
                $uniquifiedItemList[] = $itemIndexList[$index] . '_' . $item;
            } else {
                $uniquifiedItemList[] = $item;
            }
        }

        return $uniquifiedItemList;
    }
}

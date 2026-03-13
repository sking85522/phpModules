<?php

namespace NumPHP\Bitwise;

use NumPHP\Core\NDArray;

class RightShift
{
    /**
     * Shift the bits of an integer to the right.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function right_shift(NDArray $a, $b): NDArray
    {
        $bData = ($b instanceof NDArray) ? $b->getData() : $b;
        $result = self::recursiveOp($a->getData(), $bData);
        return new NDArray($result, 'int');
    }

    private static function recursiveOp($d1, $d2)
    {
        if (is_array($d1)) {
            $d2Arr = is_array($d2) ? $d2 : array_fill(0, count($d1), $d2);
            return array_map([self::class, 'recursiveOp'], $d1, $d2Arr);
        }
        return (int)$d1 >> (int)$d2;
    }
}
<?php

namespace NumPHP\Bitwise;

use NumPHP\Core\NDArray;

class Invert
{
    /**
     * Compute bit-wise inversion, or bit-wise NOT, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function invert(NDArray $a): NDArray
    {
        $data = $a->getData();
        $result = self::recursiveOp($data);
        return new NDArray($result, 'int');
    }

    private static function recursiveOp($data)
    {
        if (is_array($data)) {
            return array_map([self::class, 'recursiveOp'], $data);
        }
        return ~(int)$data;
    }
}
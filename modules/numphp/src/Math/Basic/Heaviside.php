<?php

namespace NumPHP\Math\Basic;

use NumPHP\Core\NDArray;

class Heaviside
{
    /**
     * Compute the Heaviside step function.
     *
     * @param NDArray $x1
     * @param NDArray $x2
     * @return NDArray
     */
    public static function heaviside(NDArray $x1, NDArray $x2): NDArray
    {
        $d1 = $x1->getData();
        $d2 = $x2->getData();
        $result = self::recursiveOp($d1, $d2);
        return new NDArray($result, 'float');
    }

    private static function recursiveOp($d1, $d2)
    {
        if (is_array($d1)) {
             $d2Arr = is_array($d2) ? $d2 : array_fill(0, count($d1), $d2);
            return array_map([self::class, 'recursiveOp'], $d1, $d2Arr);
        }
        if ($d1 < 0) return 0.0;
        if ($d1 > 0) return 1.0;
        return (float)$d2;
    }
}
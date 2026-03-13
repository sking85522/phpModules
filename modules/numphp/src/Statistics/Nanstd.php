<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;

class Nanstd
{
    /**
     * Compute the standard deviation along the specified axis, while ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanstd(NDArray $a, ?int $axis = null): float
    {
        $variance = Nanvar::nanvar($a, $axis);

        return sqrt($variance);
    }
}
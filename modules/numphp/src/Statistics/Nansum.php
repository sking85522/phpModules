<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Nansum
{
    /**
     * Return the sum of array elements over a given axis treating Not a Numbers (NaNs) as zero.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nansum(NDArray $a, ?int $axis = null): float
    {
        if ($axis !== null) {
            throw new \Exception("nansum with axis not implemented yet.");
        }
        $data = Flatten::flatten($a)->getData();
        $sum = 0.0;
        foreach ($data as $val) {
            if (!is_nan($val)) {
                $sum += $val;
            }
        }
        return $sum;
    }
}
<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Nanmean
{
    /**
     * Compute the arithmetic mean along the specified axis, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanmean(NDArray $a, ?int $axis = null): float
    {
        if ($axis !== null) {
            throw new \Exception("nanmean with axis not implemented yet.");
        }
        $data = Flatten::flatten($a)->getData();
        $sum = 0.0;
        $count = 0;
        foreach ($data as $val) {
            if (!is_nan($val)) {
                $sum += $val;
                $count++;
            }
        }
        return ($count > 0) ? ($sum / $count) : NAN;
    }
}
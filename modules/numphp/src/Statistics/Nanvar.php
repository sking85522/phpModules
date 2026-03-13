<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Nanvar
{
    /**
     * Compute the variance along the specified axis, while ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanvar(NDArray $a, ?int $axis = null): float
    {
        if ($axis !== null) {
            throw new \Exception("nanvar with axis not implemented yet.");
        }
        $data = Flatten::flatten($a)->getData();
        $filtered = array_values(array_filter($data, function($val) { return !is_nan($val); }));
        if (empty($filtered)) {
            return NAN;
        }

        $mean = array_sum($filtered) / count($filtered);
        $variance = array_sum(array_map(function($x) use ($mean) { return pow($x - $mean, 2); }, $filtered));

        return $variance / count($filtered);
    }
}
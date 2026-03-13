<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Sum
{
    /**
     * Sum of array elements.
     * Currently supports summing all elements (axis=null).
     */
    public static function sum(NDArray $a): float
    {
        $flat = Flatten::flatten($a);
        $data = $flat->getData();
        
        // If scalar
        if (!is_array($data)) {
            return (float)$data;
        }

        return (float)array_sum($data);
    }
}
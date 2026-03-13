<?php

namespace NumPHP\Indexing;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Compress
{
    /**
     * Return selected slices of an array along given axis.
     *
     * @param NDArray $condition
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function compress(NDArray $condition, NDArray $a, ?int $axis = null): NDArray
    {
        if ($axis === null) {
            $a = Flatten::flatten($a);
            $condition = Flatten::flatten($condition);
        }

        $a_data = $a->getData();
        $cond_data = $condition->getData();
        $result = [];

        for ($i = 0; $i < count($a_data); $i++) {
            if ($i < count($cond_data) && $cond_data[$i]) {
                $result[] = $a_data[$i];
            }
        }

        return new NDArray($result);
    }
}
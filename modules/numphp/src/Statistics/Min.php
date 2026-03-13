<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;

class Min
{
    public static function min(NDArray $a)
    {
        $data = $a->getData();
        $flattened = self::flatten($data);
        return min($flattened);
    }

    private static function flatten($data)
    {
        if (!is_array($data)) {
            return [$data];
        }
        $result = [];
        foreach ($data as $value) {
            $result = array_merge($result, self::flatten($value));
        }
        return $result;
    }
}
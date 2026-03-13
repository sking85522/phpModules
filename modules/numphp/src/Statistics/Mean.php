<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;

class Mean
{
    public static function mean(NDArray $a): float
    {
        $data = $a->getData();
        $flattened = self::flatten($data);
        return array_sum($flattened) / count($flattened);
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
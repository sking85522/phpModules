<?php

namespace NumPHP\Statistics;

use NumPHP\Core\NDArray;

class Var
{
    public static function var(NDArray $a): float
    {
        $data = $a->getData();
        $flattened = self::flatten($data);
        $mean = array_sum($flattened) / count($flattened);
        $variance = 0;
        foreach ($flattened as $value) {
            $variance += pow($value - $mean, 2);
        }
        return $variance / count($flattened);
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
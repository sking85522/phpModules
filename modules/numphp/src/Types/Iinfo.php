<?php

namespace NumPHP\Types;

use NumPHP\Core\DType;

class Iinfo
{
    /**
     * Machine limits for integer types.
     *
     * @param string $dtype
     * @return object
     */
    public static function iinfo(string $dtype)
    {
        $type = DType::getType($dtype);

        if ($type === DType::INT) {
            return (object) [
                'bits' => PHP_INT_SIZE * 8,
                'min' => PHP_INT_MIN,
                'max' => PHP_INT_MAX,
            ];
        }

        throw new \InvalidArgumentException("iinfo is only available for integer types.");
    }
}
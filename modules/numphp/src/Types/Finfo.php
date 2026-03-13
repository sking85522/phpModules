<?php

namespace NumPHP\Types;

use NumPHP\Core\DType;

class Finfo
{
    /**
     * Machine limits for floating point types.
     *
     * @param string $dtype
     * @return object
     */
    public static function finfo(string $dtype)
    {
        $type = DType::getType($dtype);

        if ($type === DType::FLOAT) {
            return (object) [
                'bits' => 64,
                'eps' => PHP_FLOAT_EPSILON,
                'max' => PHP_FLOAT_MAX,
                'min' => PHP_FLOAT_MIN,
                'resolution' => 1.0E-15,
                'tiny' => PHP_FLOAT_MIN,
            ];
        }

        throw new \InvalidArgumentException("finfo is only available for float types.");
    }
}
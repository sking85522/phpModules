<?php

namespace NumPHP\Creation;

use NumPHP\Core\NDArray;

class ArrayCreate
{
    public static function zeros(array $shape, string $dtype = null): NDArray
    {
        $data = self::createFilledArray($shape, 0);
        return new NDArray($data, $dtype);
    }

    public static function ones(array $shape, string $dtype = null): NDArray
    {
        $data = self::createFilledArray($shape, 1);
        return new NDArray($data, $dtype);
    }

    public static function full(array $shape, $value, string $dtype = null): NDArray
    {
        $data = self::createFilledArray($shape, $value);
        return new NDArray($data, $dtype);
    }

    private static function createFilledArray(array $shape, $value)
    {
        if (empty($shape)) {
            return $value;
        }

        $numElements = array_shift($shape);
        $data = [];
        for ($i = 0; $i < $numElements; $i++) {
            $data[] = self::createFilledArray($shape, $value);
        }
        return $data;
    }
}
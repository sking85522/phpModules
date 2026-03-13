<?php

namespace NumPHP\LinearAlgebra;

use NumPHP\Core\NDArray;

class Matmul
{
    public static function matmul(NDArray $a, NDArray $b): NDArray
    {
        return Dot::dot($a, $b);
    }
}
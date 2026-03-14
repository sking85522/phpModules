<?php

namespace SciPHP;

use SciPHP\Stats\Norm;
use NumPHP\Core\NDArray;

class SciPHP
{
    /**
     * A normal continuous random variable.
     *
     * @return Norm
     */
    public static function norm(): Norm
    {
        return new Norm();
    }
}
<?php

namespace NumPHP\Types;

use NumPHP\Core\NDArray;

class IsReal
{
    /**
     * Returns a bool array, where True if input element is real.
     *
     * @param NDArray $x
     * @return NDArray
     */
    public static function isreal(NDArray $x): NDArray
    {
        // In pure PHP, all standard numbers are "real".
        return \NumPHP\Creation\ArrayCreate::full($x->getShape(), true, 'bool');
    }
}
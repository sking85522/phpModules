<?php

namespace NumPHP\ArrayManipulation;

use NumPHP\Core\NDArray;

class Swapaxes
{
    /**
     * Interchange two axes of an array.
     *
     * @param NDArray $a
     * @param int $axis1
     * @param int $axis2
     * @return NDArray
     */
    public static function swapaxes(NDArray $a, int $axis1, int $axis2): NDArray
    {
        $shape = $a->getShape();
        $ndim = count($shape);
        if ($axis1 >= $ndim || $axis2 >= $ndim) {
            throw new \InvalidArgumentException("axis is out of bounds for array of dimension " . $ndim);
        }
        // For 2D array, it's a simple transpose. Higher dimensions require generic transpose.
        if ($ndim === 2) {
            return Transpose::transpose($a);
        }
        throw new \Exception("swapaxes for >2D not implemented yet.");
    }
}
<?php

namespace NumPHP\Sorting;

use NumPHP\Core\NDArray;
use NumPHP\ArrayManipulation\Flatten;

class Argsort
{
    /**
     * Returns the indices that would sort an array.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function argsort(NDArray $a, ?int $axis = -1): NDArray
    {
        if ($axis === null || $a->ndim() < 2) {
            $data = Flatten::flatten($a)->getData();
            asort($data);
            return new NDArray(array_keys($data), 'int');
        }
        
        throw new \Exception("argsort with axis for >1D not implemented yet.");
    }
}
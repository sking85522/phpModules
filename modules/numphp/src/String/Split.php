<?php

namespace NumPHP\String;

use NumPHP\Core\NDArray;

class Split
{
    /**
     * For each element in a, return a list of the words in the string, using sep as the delimiter string.
     *
     * @param NDArray $a
     * @param string $sep
     * @return NDArray
     */
    public static function split(NDArray $a, string $sep = ' '): NDArray
    {
        $data = $a->getData();
        $recursive_map = function ($item) use ($sep, &$recursive_map) {
            if (is_array($item)) {
                return array_map($recursive_map, $item);
            }
            return explode($sep, $item);
        };
        return new NDArray($recursive_map($data), 'object');
    }
}
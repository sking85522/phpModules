<?php

namespace NumPHP\String;

use NumPHP\Core\NDArray;

class Char
{
    /**
     * Create a chararray.
     *
     * @param mixed $items
     * @return NDArray
     */
    public static function char($items): NDArray
    {
        // In NumPHP, we can just use a standard NDArray with string dtype
        return new NDArray($items, 'string');
    }
}
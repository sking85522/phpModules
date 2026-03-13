<?php

namespace NumPHP\IO;

use NumPHP\Core\NDArray;

class Loadtxt
{
    /**
     * Load data from a text file.
     *
     * @param string $fname
     * @param string $delimiter
     * @return NDArray
     */
    public static function loadtxt(string $fname, string $delimiter = ' '): NDArray
    {
        if (!file_exists($fname)) {
            throw new \Exception("File not found: " . $fname);
        }
        $lines = file($fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $data = [];
        foreach ($lines as $line) {
            $data[] = array_map('floatval', explode($delimiter, $line));
        }
        if (count($data) == 1) {
            $data = $data[0];
        }
        return new NDArray($data, 'float');
    }
}
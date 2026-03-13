<?php

namespace NumPHP\IO;

use NumPHP\Core\NDArray;

class Savetxt
{
    /**
     * Save an array to a text file.
     *
     * @param string $fname
     * @param NDArray $X
     * @param string $delimiter
     */
    public static function savetxt(string $fname, NDArray $X, string $delimiter = ' '): void
    {
        $data = $X->getData();
        $shape = $X->getShape();

        $handle = fopen($fname, 'w');
        if (!$handle) {
            throw new \Exception("Cannot open file: " . $fname);
        }

        if ($X->ndim() == 1) {
            fwrite($handle, implode($delimiter, $data));
        } else { // 2D
            foreach ($data as $row) {
                fwrite($handle, implode($delimiter, $row) . "\n");
            }
        }
        fclose($handle);
    }
}
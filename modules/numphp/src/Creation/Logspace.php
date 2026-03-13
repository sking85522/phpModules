<?php

namespace NumPHP\Creation;

use NumPHP\Core\NDArray;

class Logspace
{
    public static function logspace($start, $stop, $num = 50, $base = 10.0, $endpoint = true, $dtype = null): NDArray
    {
        $data = [];
        if ($endpoint) {
            $step = ($stop - $start) / ($num - 1);
            for ($i = 0; $i < $num; $i++) {
                $data[] = pow($base, $start + ($i * $step));
            }
        } else {
            $step = ($stop - $start) / $num;
            for ($i = 0; $i < $num; $i++) {
                $data[] = pow($base, $start + ($i * $step));
            }
        }
        return new NDArray($data, $dtype);
    }
}
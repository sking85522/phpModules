<?php

namespace NumPHP\LinearAlgebra;

use NumPHP\Core\NDArray;
use NumPHP\Core\DType;

class Cholesky
{
    /**
     * Cholesky decomposition.
     * Return the Cholesky decomposition, L * L.H, of the square matrix a, where L is lower-triangular.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function cholesky(NDArray $a): NDArray
    {
        $data = $a->getData();
        $shape = $a->getShape();

        if (count($shape) !== 2 || $shape[0] !== $shape[1]) {
            throw new \InvalidArgumentException("Input must be a square 2D matrix");
        }

        $n = $shape[0];
        $L = array_fill(0, $n, array_fill(0, $n, 0.0));

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                $sum = 0;
                for ($k = 0; $k < $j; $k++) {
                    $sum += $L[$i][$k] * $L[$j][$k];
                }

                if ($i == $j) {
                    $val = $data[$i][$i] - $sum;
                    if ($val <= 0) {
                        throw new \Exception("Matrix is not positive definite");
                    }
                    $L[$i][$j] = sqrt($val);
                } else {
                    $L[$i][$j] = ($data[$i][$j] - $sum) / $L[$j][$j];
                }
            }
        }

        return new NDArray($L, DType::FLOAT);
    }
}
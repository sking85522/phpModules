<?php

namespace NumPHP\LinearAlgebra;

use NumPHP\Core\NDArray;

class Matmul
{
    public static function matmul(NDArray $a, NDArray $b): NDArray
    {
        $shapeA = $a->getShape();
        $shapeB = $b->getShape();

        // Basic 2D matrix multiplication validation
        if (count($shapeA) !== 2 || count($shapeB) !== 2) {
             throw new \InvalidArgumentException("Matmul currently supports 2D arrays only.");
        }

        if ($shapeA[1] !== $shapeB[0]) {
            throw new \InvalidArgumentException(
                sprintf("Shapes %s and %s not aligned: %d (dim 1) != %d (dim 0)", 
                json_encode($shapeA), json_encode($shapeB), $shapeA[1], $shapeB[0])
            );
        }

        $dataA = $a->getData();
        $dataB = $b->getData();

        $m = $shapeA[0]; // Rows of A
        $k = $shapeA[1]; // Cols of A (and Rows of B)
        $n = $shapeB[1]; // Cols of B

        $result = [];

        // Initialize result matrix
        for ($i = 0; $i < $m; $i++) {
            $result[$i] = array_fill(0, $n, 0);
        }

        // O(N^3) Multiplication
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $sum = 0;
                for ($l = 0; $l < $k; $l++) {
                    $sum += $dataA[$i][$l] * $dataB[$l][$j];
                }
                $result[$i][$j] = $sum;
            }
        }

        return new NDArray($result);
    }
}
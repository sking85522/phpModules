<?php

namespace NumPHP\LinearAlgebra;

use NumPHP\Core\NDArray;

class Dot
{
    public static function dot(NDArray $a, NDArray $b): NDArray
    {
        $dataA = $a->getData();
        $dataB = $b->getData();

        if ($a->getShape() == [2, 2] && $b->getShape() == [2, 2]) {
            $result = [[0, 0], [0, 0]];
            $result[0][0] = $dataA[0][0] * $dataB[0][0] + $dataA[0][1] * $dataB[1][0];
            $result[0][1] = $dataA[0][0] * $dataB[0][1] + $dataA[0][1] * $dataB[1][1];
            $result[1][0] = $dataA[1][0] * $dataB[0][0] + $dataA[1][1] * $dataB[1][0];
            $result[1][1] = $dataA[1][0] * $dataB[0][1] + $dataA[1][1] * $dataB[1][1];
            return new NDArray($result);
        }

        throw new \Exception('Dot product is not implemented for these shapes yet');
    }
}
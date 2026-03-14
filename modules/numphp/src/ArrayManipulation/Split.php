<?php

namespace NumPHP\ArrayManipulation;

use NumPHP\Core\NDArray;

class Split
{
    /**
     * Split an array into multiple sub-arrays.
     *
     * @param NDArray $ary
     * @param int|array $indices_or_sections If int, number of equal divisions. If array, sorted indices.
     * @param int $axis
     * @return NDArray[] Array of NDArrays
     */
    public static function split(NDArray $ary, $indices_or_sections, int $axis = 0): array
    {
        $data = $ary->getData();
        $shape = $ary->getShape();
        
        if ($axis !== 0) {
            throw new \Exception("Split currently only implemented for axis 0");
        }

        $total = $shape[0];
        $sections = [];
        $dtype = $ary->getDtype();

        if (is_int($indices_or_sections)) {
            $n = $indices_or_sections;
            if ($total % $n !== 0) {
                 throw new \InvalidArgumentException("array split does not result in an equal division");
            }
            $chunkSize = $total / $n;
            // array_chunk preserves keys by default false, which is what we want for re-indexing 0..N
            $chunks = array_chunk($data, $chunkSize);
            foreach ($chunks as $c) {
                $sections[] = new NDArray($c, $dtype);
            }
        } elseif (is_array($indices_or_sections)) {
            // Split at specific indices
            // e.g. [2, 5] means ary[:2], ary[2:5], ary[5:]
            $last = 0;
            foreach ($indices_or_sections as $idx) {
                $length = $idx - $last;
                $slice = array_slice($data, $last, $length);
                $sections[] = new NDArray($slice, $dtype);
                $last = $idx;
            }
            // Remaining
            $slice = array_slice($data, $last);
            $sections[] = new NDArray($slice, $dtype);
        } else {
            throw new \InvalidArgumentException("indices_or_sections must be int or array of ints");
        }

        return $sections;
    }
}
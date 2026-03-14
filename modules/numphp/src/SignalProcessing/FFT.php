<?php

namespace NumPHP\SignalProcessing;

use NumPHP\Core\NDArray;

class FFT
{
    /**
     * Compute the one-dimensional discrete Fourier Transform.
     */
    public static function fft(NDArray $a): NDArray
    {
        // A full FFT implementation is very complex.
        throw new \Exception("fft is a placeholder and not fully implemented in pure PHP.");
    }
}
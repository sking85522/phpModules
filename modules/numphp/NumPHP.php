<?php

require_once 'autoload.php';

use NumPHP\Core\NDArray;
use NumPHP\Creation\ArrayCreate;
use NumPHP\Creation\Arange;
use NumPHP\Creation\Eye;
use NumPHP\Creation\Identity;
use NumPHP\Creation\Linspace;
use NumPHP\Creation\Logspace;
use NumPHP\Math\Basic\Add;
use NumPHP\Math\Basic\Subtract;
use NumPHP\Math\Basic\Multiply;
use NumPHP\Math\Basic\Divide;
use NumPHP\Math\Trigonometry\Sin;
use NumPHP\Math\Trigonometry\Cos;
use NumPHP\Math\Trigonometry\Tan;
use NumPHP\Math\Exponential\Exp;
use NumPHP\Math\Exponential\Log;
use NumPHP\Statistics\Mean;
use NumPHP\Statistics\Median;
use NumPHP\Statistics\Std;
use NumPHP\Statistics\Var_ as VarAlias;
use NumPHP\Statistics\Max;
use NumPHP\Statistics\Min;

class NumPHP
{
    /**
     * Creates an array.
     *
     * @param mixed $data
     * @param mixed $dtype
     * @return NDArray
     */
    public static function array($data, $dtype = null): NDArray
    {
        return new NDArray($data, $dtype);
    }

    /**
     * Return a new array of given shape and type, filled with zeros.
     *
     * @param array $shape
     * @param string|null $dtype
     * @return NDArray
     */
    public static function zeros(array $shape, string $dtype = null): NDArray
    {
        return ArrayCreate::zeros($shape, $dtype);
    }

    /**
     * Return a new array of given shape and type, filled with ones.
     *
     * @param array $shape
     * @param string|null $dtype
     * @return NDArray
     */
    public static function ones(array $shape, string $dtype = null): NDArray
    {
        return ArrayCreate::ones($shape, $dtype);
    }

    /**
     * Return a new array of given shape and type, filled with a custom value.
     *
     * @param array $shape
     * @param mixed $value
     * @param string|null $dtype
     * @return NDArray
     */
    public static function full(array $shape, $value, string $dtype = null): NDArray
    {
        return ArrayCreate::full($shape, $value, $dtype);
    }

    /**
     * Return evenly spaced values within a given interval.
     *
     * @param int $start
     * @param int $stop
     * @param int $step
     * @param string|null $dtype
     * @return NDArray
     */
    public static function arange($start, $stop = null, $step = 1, $dtype = null): NDArray
    {
        return Arange::arange($start, $stop, $step, $dtype);
    }

    /**
     * Return a 2-D array with ones on the diagonal and zeros elsewhere.
     *
     * @param int $N
     * @param int|null $M
     * @param int $k
     * @param string|null $dtype
     * @return NDArray
     */
    public static function eye($N, $M = null, $k = 0, $dtype = null): NDArray
    {
        return Eye::eye($N, $M, $k, $dtype);
    }

    /**
     * Return the identity array.
     *
     * @param int $n
     * @param string|null $dtype
     * @return NDArray
     */
    public static function identity($n, $dtype = null): NDArray
    {
        return Identity::identity($n, $dtype);
    }

    /**
     * Return evenly spaced numbers over a specified interval.
     *
     * @param int $start
     * @param int $stop
     * @param int $num
     * @param bool $endpoint
     * @param bool $retstep
     * @param string|null $dtype
     * @return NDArray
     */
    public static function linspace($start, $stop, $num = 50, $endpoint = true, $retstep = false, $dtype = null): NDArray
    {
        return Linspace::linspace($start, $stop, $num, $endpoint, $retstep, $dtype);
    }

    /**
     * Return numbers spaced evenly on a log scale.
     *
     * @param int $start
     * @param int $stop
     * @param int $num
     * @param float $base
     * @param bool $endpoint
     * @param string|null $dtype
     * @return NDArray
     */
    public static function logspace($start, $stop, $num = 50, $base = 10.0, $endpoint = true, $dtype = null): NDArray
    {
        return Logspace::logspace($start, $stop, $num, $base, $endpoint, $dtype);
    }

    /**
     * Adds two arrays element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function add(NDArray $a, NDArray $b): NDArray
    {
        return Add::add($a, $b);
    }

    /**
     * Subtracts two arrays element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function subtract(NDArray $a, NDArray $b): NDArray
    {
        return Subtract::subtract($a, $b);
    }

    /**
     * Multiplies two arrays element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function multiply(NDArray $a, NDArray $b): NDArray
    {
        return Multiply::multiply($a, $b);
    }

    /**
     * Divides two arrays element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function divide(NDArray $a, NDArray $b): NDArray
    {
        return Divide::divide($a, $b);
    }

    /**
     * Computes the sine of an array element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function sin(NDArray $a): NDArray
    {
        return Sin::sin($a);
    }

    /**
     * Computes the cosine of an array element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function cos(NDArray $a): NDArray
    {
        return Cos::cos($a);
    }

    /**
     * Computes the tangent of an array element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function tan(NDArray $a): NDArray
    {
        return Tan::tan($a);
    }

    /**
     * Computes the exponential of an array element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function exp(NDArray $a): NDArray
    {
        return Exp::exp($a);
    }

    /**
     * Computes the natural logarithm of an array element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function log(NDArray $a): NDArray
    {
        return Log::log($a);
    }

    /**
     * Computes the arithmetic mean of an array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function mean(NDArray $a): float
    {
        return Mean::mean($a);
    }

    /**
     * Computes the median of an array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function median(NDArray $a): float
    {
        return Median::median($a);
    }

    /**
     * Computes the standard deviation of an array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function std(NDArray $a): float
    {
        return Std::std($a);
    }

    /**
     * Computes the variance of an array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function var(NDArray $a): float
    {
        return VarAlias::var($a);
    }

    /**
     * Finds the maximum value of an array.
     *
     * @param NDArray $a
     * @return mixed
     */
    public static function max(NDArray $a)
    {
        return Max::max($a);
    }

    /**
     * Finds the minimum value of an array.
     *
     * @param NDArray $a
     * @return mixed
     */
    public static function min(NDArray $a)
    {
        return Min::min($a);
    }
}
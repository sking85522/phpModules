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
use NumPHP\LinearAlgebra\Matmul;
use NumPHP\ArrayManipulation\Reshape;
use NumPHP\ArrayManipulation\Transpose;
use NumPHP\ArrayManipulation\Flatten;
use NumPHP\LinearAlgebra\Dot;
use NumPHP\Random\Rand;
use NumPHP\Random\Randn;
use NumPHP\Random\Choice;
use NumPHP\ArrayManipulation\Concatenate;
use NumPHP\ArrayManipulation\Split;
use NumPHP\ArrayManipulation\Vstack;
use NumPHP\ArrayManipulation\Hstack;
use NumPHP\LinearAlgebra\Determinant;
use NumPHP\LinearAlgebra\Inverse;
use NumPHP\Statistics\Sum;
use NumPHP\Statistics\Prod;
use NumPHP\Statistics\Argmax;
use NumPHP\Statistics\Argmin;
use NumPHP\Indexing\Where;
use NumPHP\Math\Basic\Sqrt;
use NumPHP\Math\Basic\Power;
use NumPHP\Math\Basic\Abs;
use NumPHP\Math\Trigonometry\Arcsin;
use NumPHP\Math\Trigonometry\Arccos;
use NumPHP\Math\Trigonometry\Arctan;
use NumPHP\IO\Save;
use NumPHP\IO\Load;
use NumPHP\Sorting\Sort;
use NumPHP\Math\Basic\Clip;
use NumPHP\Math\Basic\Round;
use NumPHP\Math\Basic\Floor;
use NumPHP\Math\Basic\Ceil;
use NumPHP\Math\Comparison\Equal;
use NumPHP\Math\Comparison\NotEqual;
use NumPHP\Math\Comparison\Greater;
use NumPHP\Math\Comparison\GreaterEqual;
use NumPHP\Math\Comparison\Less;
use NumPHP\Math\Comparison\LessEqual;
use NumPHP\Math\Logical\LogicalAnd;
use NumPHP\Math\Logical\LogicalOr;
use NumPHP\Math\Logical\LogicalNot;
use NumPHP\Math\Basic\Sign;
use NumPHP\Math\Basic\Negative;
use NumPHP\Math\Basic\Reciprocal;
use NumPHP\Statistics\Average;
use NumPHP\Sets\Unique;
use NumPHP\ArrayManipulation\Flip;
use NumPHP\ArrayManipulation\Repeat;
use NumPHP\ArrayManipulation\Tile;
use NumPHP\Math\Logical\All;
use NumPHP\Math\Logical\Any;
use NumPHP\Math\Hyperbolic\Sinh;
use NumPHP\Math\Hyperbolic\Cosh;
use NumPHP\Math\Hyperbolic\Tanh;
use NumPHP\LinearAlgebra\Trace;
use NumPHP\LinearAlgebra\Diag;
use NumPHP\Statistics\Cumsum;
use NumPHP\Statistics\Cumprod;
use NumPHP\ArrayManipulation\ExpandDims;
use NumPHP\ArrayManipulation\Squeeze;
use NumPHP\Math\FloatingPoint\IsNan;
use NumPHP\Math\FloatingPoint\IsInf;
use NumPHP\Math\FloatingPoint\IsFinite;
use NumPHP\Math\Calculus\Diff;
use NumPHP\LinearAlgebra\Norm;
use NumPHP\LinearAlgebra\Solve;
use NumPHP\Math\FloatingPoint\NanToNum;
use NumPHP\ArrayManipulation\Pad;
use NumPHP\ArrayManipulation\Roll;
use NumPHP\Sets\Intersect1D;
use NumPHP\Sets\Setdiff1D;
use NumPHP\Sets\Union1D;
use NumPHP\LinearAlgebra\Kron;
use NumPHP\Math\Calculus\Gradient;
use NumPHP\LinearAlgebra\Cholesky;
use NumPHP\LinearAlgebra\Lstsq;
use NumPHP\SignalProcessing\FFT;
use NumPHP\Polynomial\Polyval;
use NumPHP\Polynomial\Polyfit;
use NumPHP\Polynomial\Roots;
use NumPHP\LinearAlgebra\Pinv;
use NumPHP\SignalProcessing\IFFT;
use NumPHP\SignalProcessing\FFTShift;
use NumPHP\Statistics\Quantile;
use NumPHP\Statistics\Histogram;
use NumPHP\ArrayManipulation\Append;
use NumPHP\ArrayManipulation\Delete;
use NumPHP\ArrayManipulation\Insert;
use NumPHP\Statistics\Percentile;
use NumPHP\Statistics\Covariance;
use NumPHP\Statistics\Corrcoef;
use NumPHP\SignalProcessing\Window;
use NumPHP\Math\Exponential\Log10;
use NumPHP\Math\Exponential\Log2;
use NumPHP\Math\Exponential\Expm1;
use NumPHP\Math\Exponential\Log1p;
use NumPHP\Math\Trigonometry\Hypot;
use NumPHP\Math\Trigonometry\Arctan2;
use NumPHP\Math\Basic\Degrees;
use NumPHP\Math\Basic\Radians;
use NumPHP\Math\Basic\Fmod;
use NumPHP\Bitwise\BitwiseAnd;
use NumPHP\Bitwise\BitwiseOr;
use NumPHP\Bitwise\BitwiseXor;
use NumPHP\Bitwise\Invert;
use NumPHP\Bitwise\LeftShift;
use NumPHP\Bitwise\RightShift;
use NumPHP\ArrayManipulation\Ravel;
use NumPHP\ArrayManipulation\TrimZeros;
use NumPHP\ArrayManipulation\Swapaxes;
use NumPHP\ArrayManipulation\Atleast1d;
use NumPHP\ArrayManipulation\Atleast2d;
use NumPHP\ArrayManipulation\Atleast3d;
use NumPHP\Statistics\Ptp;
use NumPHP\Statistics\Nansum;
use NumPHP\Statistics\Nanmean;
use NumPHP\Indexing\Argwhere;
use NumPHP\Indexing\Nonzero;
use NumPHP\Indexing\Searchsorted;
use NumPHP\Indexing\Take;
use NumPHP\Indexing\Choose;
use NumPHP\Indexing\Compress;
use NumPHP\Sorting\Argsort;
use NumPHP\Sorting\Partition;
use NumPHP\Sorting\Argpartition;
use NumPHP\Statistics\Nanmin;
use NumPHP\Statistics\Nanmax;
use NumPHP\Statistics\Nanstd;
use NumPHP\Statistics\Nanvar;
use NumPHP\Statistics\Nanmedian;
use NumPHP\Statistics\Bincount;
use NumPHP\IO\Savetxt;
use NumPHP\IO\Loadtxt;
use NumPHP\String\Char;
use NumPHP\String\Capitalize;
use NumPHP\String\Center;
use NumPHP\String\Lower;
use NumPHP\String\Upper;
use NumPHP\String\Split as StringSplit;
use NumPHP\String\Join;
use NumPHP\Types\CanCast;
use NumPHP\Types\IsComplex;
use NumPHP\Types\IsReal;
use NumPHP\Types\Finfo;
use NumPHP\Types\Iinfo;
use NumPHP\Types\IsScalar;
use NumPHP\String\Decode;
use NumPHP\String\Encode;
use NumPHP\String\Replace;
use NumPHP\String\Strip;
use NumPHP\Math\Basic\Copysign;
use NumPHP\Math\Basic\Unwrap;
use NumPHP\Sets\Isin;
use NumPHP\Creation\EmptyLike;
use NumPHP\Creation\FullLike;
use NumPHP\Creation\OnesLike;
use NumPHP\Creation\ZerosLike;
use NumPHP\ArrayManipulation\Stack;
use NumPHP\ArrayManipulation\ColumnStack;
use NumPHP\ArrayManipulation\Hsplit;
use NumPHP\ArrayManipulation\Vsplit;
use NumPHP\Statistics\Digitize;
use NumPHP\Statistics\Nancumsum;
use NumPHP\String\Ljust;
use NumPHP\String\Rjust;
use NumPHP\String\Title;
use NumPHP\Indexing\Select;




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
     * @param int|null $axis
     * @return float|NDArray
     */
    public static function mean(NDArray $a, ?int $axis = null)
    {
        return Mean::mean($a, $axis);
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
     * @param int|null $axis
     * @return float|NDArray
     */
    public static function std(NDArray $a, ?int $axis = null)
    {
        return Std::std($a, $axis);
    }

    /**
     * Computes the variance of an array.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float|NDArray
     */
    public static function var(NDArray $a, ?int $axis = null)
    {
        return VarAlias::var($a, $axis);
    }

    /**
     * Finds the maximum value of an array.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return mixed
     */
    public static function max(NDArray $a, ?int $axis = null)
    {
        return Max::max($a, $axis);
    }

    /**
     * Finds the minimum value of an array.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return mixed
     */
    public static function min(NDArray $a, ?int $axis = null)
    {
        return Min::min($a, $axis);
    }

    /**
     * Matrix product of two arrays.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function matmul(NDArray $a, NDArray $b): NDArray
    {
        return Matmul::matmul($a, $b);
    }

    /**
     * Gives a new shape to an array without changing its data.
     *
     * @param NDArray $a
     * @param array $newShape
     * @return NDArray
     */
    public static function reshape(NDArray $a, array $newShape): NDArray
    {
        return Reshape::reshape($a, $newShape);
    }

    /**
     * Reverse or permute the axes of an array; returns the modified array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function transpose(NDArray $a): NDArray
    {
        return Transpose::transpose($a);
    }

    /**
     * Return a copy of the array collapsed into one dimension.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function flatten(NDArray $a): NDArray
    {
        return Flatten::flatten($a);
    }

    /**
     * Random values in a given shape.
     *
     * @param array $shape
     * @return NDArray
     */
    public static function rand(array $shape): NDArray
    {
        return Rand::rand($shape);
    }

    /**
     * Return a sample (or samples) from the "standard normal" distribution.
     *
     * @param array $shape
     * @return NDArray
     */
    public static function randn(array $shape): NDArray
    {
        return Randn::randn($shape);
    }

    /**
     * Generates a random sample from a given 1-D array.
     *
     * @param mixed $a
     * @param int|array|null $size
     * @param bool $replace
     * @param array|null $p
     * @return NDArray
     */
    public static function choice($a, $size = null, bool $replace = true, array $p = null): NDArray
    {
        return Choice::choice($a, $size, $replace, $p);
    }

    /**
     * Join a sequence of arrays along an existing axis.
     *
     * @param array $arrays Sequence of NDArrays
     * @param int $axis
     * @return NDArray
     */
    public static function concatenate(array $arrays, int $axis = 0): NDArray
    {
        return Concatenate::concatenate($arrays, $axis);
    }

    /**
     * Split an array into multiple sub-arrays.
     *
     * @param NDArray $ary
     * @param int|array $indices_or_sections
     * @param int $axis
     * @return array Array of NDArrays
     */
    public static function split(NDArray $ary, $indices_or_sections, int $axis = 0): array
    {
        return Split::split($ary, $indices_or_sections, $axis);
    }

    /**
     * Compute the determinant of an array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function det(NDArray $a): float
    {
        return Determinant::det($a);
    }

    /**
     * Compute the (multiplicative) inverse of a matrix.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function inv(NDArray $a): NDArray
    {
        return Inverse::inverse($a);
    }

    /**
     * Sum of array elements.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float|NDArray
     */
    public static function sum(NDArray $a, ?int $axis = null)
    {
        return Sum::sum($a, $axis);
    }

    /**
     * Return the product of array elements.
     *
     * @param NDArray $a
     * @return float
     */
    public static function prod(NDArray $a): float
    {
        return Prod::prod($a);
    }

    /**
     * Return elements chosen from x or y depending on condition.
     *
     * @param NDArray $condition
     * @param mixed $x NDArray or scalar
     * @param mixed $y NDArray or scalar
     * @return NDArray
     */
    public static function where(NDArray $condition, $x, $y): NDArray
    {
        return Where::where($condition, $x, $y);
    }

    /**
     * Dot product of two arrays.
     *
     * @param mixed $a NDArray or scalar
     * @param mixed $b NDArray or scalar
     * @return mixed Float/Int for vector dot, NDArray for matrix mul
     */
    public static function dot($a, $b)
    {
        return Dot::dot($a, $b);
    }

    /**
     * Returns the indices of the maximum values along an axis.
     *
     * @param NDArray $a
     * @return int
     */
    public static function argmax(NDArray $a): int
    {
        return Argmax::argmax($a);
    }

    /**
     * Returns the indices of the minimum values along an axis.
     *
     * @param NDArray $a
     * @return int
     */
    public static function argmin(NDArray $a): int
    {
        return Argmin::argmin($a);
    }

    /**
     * Return the non-negative square-root of an array, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function sqrt(NDArray $a): NDArray
    {
        return Sqrt::sqrt($a);
    }

    /**
     * First array elements raised to powers from second array (or scalar), element-wise.
     *
     * @param NDArray $a
     * @param mixed $exponent
     * @return NDArray
     */
    public static function power(NDArray $a, $exponent): NDArray
    {
        return Power::power($a, $exponent);
    }

    /**
     * Calculate the absolute value element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function abs(NDArray $a): NDArray
    {
        return Abs::abs($a);
    }

    /**
     * Stack arrays in sequence vertically (row wise).
     *
     * @param array $tup Sequence of NDArrays.
     * @return NDArray
     */
    public static function vstack(array $tup): NDArray
    {
        return Vstack::vstack($tup);
    }

    /**
     * Stack arrays in sequence horizontally (column wise).
     *
     * @param array $tup Sequence of NDArrays.
     * @return NDArray
     */
    public static function hstack(array $tup): NDArray
    {
        return Hstack::hstack($tup);
    }

    /**
     * Inverse sine, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function arcsin(NDArray $a): NDArray
    {
        return Arcsin::arcsin($a);
    }

    /**
     * Inverse cosine, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function arccos(NDArray $a): NDArray
    {
        return Arccos::arccos($a);
    }

    /**
     * Inverse tangent, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function arctan(NDArray $a): NDArray
    {
        return Arctan::arctan($a);
    }

    /**
     * Save an array to a text file in JSON format.
     *
     * @param string $file
     * @param NDArray $arr
     */
    public static function save(string $file, NDArray $arr): void
    {
        Save::save($file, $arr);
    }

    /**
     * Load an array from a text file (JSON format).
     *
     * @param string $file
     * @return NDArray
     */
    public static function load(string $file): NDArray
    {
        return Load::load($file);
    }

    /**
     * Return a sorted copy of an array.
     *
     * @param NDArray $a
     * @param int|null $axis Axis along which to sort. -1 means last axis. null means flatten.
     * @return NDArray
     */
    public static function sort(NDArray $a, ?int $axis = -1): NDArray
    {
        return Sort::sort($a, $axis);
    }

    /**
     * Clip (limit) the values in an array.
     *
     * @param NDArray $a
     * @param float|int|null $min
     * @param float|int|null $max
     * @return NDArray
     */
    public static function clip(NDArray $a, $min, $max): NDArray
    {
        return Clip::clip($a, $min, $max);
    }

    /**
     * Evenly round to the given number of decimals.
     *
     * @param NDArray $a
     * @param int $decimals
     * @return NDArray
     */
    public static function round(NDArray $a, int $decimals = 0): NDArray
    {
        return Round::round($a, $decimals);
    }

    /**
     * Return the floor of the input, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function floor(NDArray $a): NDArray
    {
        return Floor::floor($a);
    }

    /**
     * Return the ceiling of the input, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function ceil(NDArray $a): NDArray
    {
        return Ceil::ceil($a);
    }

    /**
     * Return the truth value of (a == b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function equal(NDArray $a, $b): NDArray
    {
        return Equal::equal($a, $b);
    }

    /**
     * Return the truth value of (a != b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function not_equal(NDArray $a, $b): NDArray
    {
        return NotEqual::not_equal($a, $b);
    }

    /**
     * Return the truth value of (a > b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function greater(NDArray $a, $b): NDArray
    {
        return Greater::greater($a, $b);
    }

    /**
     * Return the truth value of (a >= b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function greater_equal(NDArray $a, $b): NDArray
    {
        return GreaterEqual::greater_equal($a, $b);
    }

    /**
     * Return the truth value of (a < b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function less(NDArray $a, $b): NDArray
    {
        return Less::less($a, $b);
    }

    /**
     * Return the truth value of (a <= b) element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function less_equal(NDArray $a, $b): NDArray
    {
        return LessEqual::less_equal($a, $b);
    }

    /**
     * Compute the truth value of a AND b element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function logical_and(NDArray $a, NDArray $b): NDArray
    {
        return LogicalAnd::logical_and($a, $b);
    }

    /**
     * Compute the truth value of a OR b element-wise.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function logical_or(NDArray $a, NDArray $b): NDArray
    {
        return LogicalOr::logical_or($a, $b);
    }

    /**
     * Returns an element-wise indication of the sign of a number.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function sign(NDArray $a): NDArray
    {
        return Sign::sign($a);
    }

    /**
     * Numerical negative, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function negative(NDArray $a): NDArray
    {
        return Negative::negative($a);
    }

    /**
     * Return the reciprocal of the argument, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function reciprocal(NDArray $a): NDArray
    {
        return Reciprocal::reciprocal($a);
    }

    /**
     * Compute the weighted average along the specified axis.
     *
     * @param NDArray $a
     * @param NDArray|array|null $weights
     * @return float
     */
    public static function average(NDArray $a, $weights = null): float
    {
        return Average::average($a, $weights);
    }

    /**
     * Find the unique elements of an array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function unique(NDArray $a): NDArray
    {
        return Unique::unique($a);
    }

    /**
     * Reverse the order of elements in an array along the given axis.
     *
     * @param NDArray $m
     * @param int|null $axis
     * @return NDArray
     */
    public static function flip(NDArray $m, ?int $axis = null): NDArray
    {
        return Flip::flip($m, $axis);
    }

    /**
     * Repeat elements of an array.
     *
     * @param NDArray $a
     * @param int $repeats
     * @return NDArray
     */
    public static function repeat(NDArray $a, int $repeats): NDArray
    {
        return Repeat::repeat($a, $repeats);
    }

    /**
     * Construct an array by repeating A the number of times given by reps.
     *
     * @param NDArray $a
     * @param int $reps
     * @return NDArray
     */
    public static function tile(NDArray $a, int $reps): NDArray
    {
        return Tile::tile($a, $reps);
    }

    /**
     * Test whether all array elements along a given axis evaluate to True.
     *
     * @param NDArray $a
     * @return bool
     */
    public static function all(NDArray $a): bool
    {
        return All::all($a);
    }

    /**
     * Test whether any array element along a given axis evaluates to True.
     *
     * @param NDArray $a
     * @return bool
     */
    public static function any(NDArray $a): bool
    {
        return Any::any($a);
    }

    /**
     * Hyperbolic sine, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function sinh(NDArray $a): NDArray
    {
        return Sinh::sinh($a);
    }

    /**
     * Hyperbolic cosine, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function cosh(NDArray $a): NDArray
    {
        return Cosh::cosh($a);
    }

    /**
     * Hyperbolic tangent, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function tanh(NDArray $a): NDArray
    {
        return Tanh::tanh($a);
    }

    /**
     * Return the sum along diagonals of the array.
     *
     * @param NDArray $a
     * @return float
     */
    public static function trace(NDArray $a): float
    {
        return Trace::trace($a);
    }

    /**
     * Extract a diagonal or construct a diagonal array.
     *
     * @param NDArray $v
     * @param int $k
     * @return NDArray
     */
    public static function diag(NDArray $v, int $k = 0): NDArray
    {
        return Diag::diag($v, $k);
    }

    /**
     * Expand the shape of an array.
     *
     * @param NDArray $a
     * @param int $axis
     * @return NDArray
     */
    public static function expand_dims(NDArray $a, int $axis): NDArray
    {
        return ExpandDims::expand_dims($a, $axis);
    }

    /**
     * Remove single-dimensional entries from the shape of an array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function squeeze(NDArray $a): NDArray
    {
        return Squeeze::squeeze($a);
    }

    /**
     * Return the cumulative sum of the elements along a given axis.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function cumsum(NDArray $a, ?int $axis = null): NDArray
    {
        return Cumsum::cumsum($a, $axis);
    }

    /**
     * Return the cumulative product of elements along a given axis.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function cumprod(NDArray $a, ?int $axis = null): NDArray
    {
        return Cumprod::cumprod($a, $axis);
    }

    /**
     * Test element-wise for NaN and return result as a boolean array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function isnan(NDArray $a): NDArray
    {
        return IsNan::isnan($a);
    }

    /**
     * Test element-wise for positive or negative infinity.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function isinf(NDArray $a): NDArray
    {
        return IsInf::isinf($a);
    }

    /**
     * Test element-wise for finiteness (not infinity or not Not a Number).
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function isfinite(NDArray $a): NDArray
    {
        return IsFinite::isfinite($a);
    }

    /**
     * Calculate the n-th discrete difference along the given axis.
     *
     * @param NDArray $a
     * @param int $n
     * @return NDArray
     */
    public static function diff(NDArray $a, int $n = 1): NDArray
    {
        return Diff::diff($a, $n);
    }

    /**
     * Matrix or vector norm.
     *
     * @param NDArray $x
     * @return float
     */
    public static function norm(NDArray $x): float
    {
        return Norm::norm($x);
    }

    /**
     * Solve a linear matrix equation, or system of linear scalar equations.
     * Computes the "exact" solution, x, of the well-determined, i.e., full rank, linear matrix equation ax = b.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function solve(NDArray $a, NDArray $b): NDArray
    {
        return Solve::solve($a, $b);
    }

    /**
     * Replace NaN with zero and infinity with large finite numbers.
     *
     * @param NDArray $a
     * @param float $nan
     * @param float|null $posinf
     * @param float|null $neginf
     * @return NDArray
     */
    public static function nan_to_num(NDArray $a, float $nan = 0.0, ?float $posinf = null, ?float $neginf = null): NDArray
    {
        return NanToNum::nan_to_num($a, $nan, $posinf, $neginf);
    }

    /**
     * Pad an array.
     *
     * @param NDArray $array
     * @param int|array $pad_width
     * @param string $mode
     * @param array $constant_values
     * @return NDArray
     */
    public static function pad(NDArray $array, $pad_width, string $mode = 'constant', array $constant_values = [0]): NDArray
    {
        return Pad::pad($array, $pad_width, $mode, $constant_values);
    }

    /**
     * Roll array elements along a given axis.
     *
     * @param NDArray $a
     * @param int $shift
     * @return NDArray
     */
    public static function roll(NDArray $a, int $shift): NDArray
    {
        return Roll::roll($a, $shift);
    }

    /**
     * Find the intersection of two arrays.
     *
     * @param NDArray $ar1
     * @param NDArray $ar2
     * @return NDArray
     */
    public static function intersect1d(NDArray $ar1, NDArray $ar2): NDArray
    {
        return Intersect1D::intersect1d($ar1, $ar2);
    }

    /**
     * Find the set difference of two arrays.
     *
     * @param NDArray $ar1
     * @param NDArray $ar2
     * @return NDArray
     */
    public static function setdiff1d(NDArray $ar1, NDArray $ar2): NDArray
    {
        return Setdiff1D::setdiff1d($ar1, $ar2);
    }

    /**
     * Find the union of two arrays.
     *
     * @param NDArray $ar1
     * @param NDArray $ar2
     * @return NDArray
     */
    public static function union1d(NDArray $ar1, NDArray $ar2): NDArray
    {
        return Union1D::union1d($ar1, $ar2);
    }

    /**
     * Kronecker product of two arrays.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function kron(NDArray $a, NDArray $b): NDArray
    {
        return Kron::kron($a, $b);
    }

    /**
     * Return the gradient of an N-dimensional array.
     *
     * @param NDArray $f
     * @return NDArray
     */
    public static function gradient(NDArray $f): NDArray
    {
        return Gradient::gradient($f);
    }

    /**
     * Cholesky decomposition.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function cholesky(NDArray $a): NDArray
    {
        return Cholesky::cholesky($a);
    }

    /**
     * Return the least-squares solution to a linear matrix equation.
     *
     * @param NDArray $a
     * @param NDArray $b
     * @return NDArray
     */
    public static function lstsq(NDArray $a, NDArray $b): NDArray
    {
        return Lstsq::lstsq($a, $b);
    }

    /**
     * Compute the one-dimensional discrete Fourier Transform.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function fft(NDArray $a): NDArray
    {
        return FFT::fft($a);
    }

    /**
     * Evaluate a polynomial at specific values.
     *
     * @param NDArray|array $p
     * @param NDArray|float|int $x
     * @return NDArray
     */
    public static function polyval($p, $x): NDArray
    {
        return Polyval::polyval($p, $x);
    }

    /**
     * Append values to the end of an array.
     *
     * @param NDArray $arr
     * @param mixed $values
     * @param int|null $axis
     * @return NDArray
     */
    public static function append(NDArray $arr, $values, ?int $axis = null): NDArray
    {
        return Append::append($arr, $values, $axis);
    }

    /**
     * Return a new array with sub-arrays along an axis deleted.
     *
     * @param NDArray $arr
     * @param int|array $obj
     * @param int|null $axis
     * @return NDArray
     */
    public static function delete(NDArray $arr, $obj, ?int $axis = null): NDArray
    {
        return Delete::delete($arr, $obj, $axis);
    }

    /**
     * Insert values along the given axis before the given indices.
     *
     * @param NDArray $arr
     * @param int $obj
     * @param mixed $values
     * @param int|null $axis
     * @return NDArray
     */
    public static function insert(NDArray $arr, int $obj, $values, ?int $axis = null): NDArray
    {
        return Insert::insert($arr, $obj, $values, $axis);
    }

    /**
     * Compute the q-th percentile of the data.
     *
     * @param NDArray $a
     * @param float $q
     * @return float
     */
    public static function percentile(NDArray $a, float $q): float
    {
        return Percentile::percentile($a, $q);
    }

    /**
     * Estimate a covariance matrix.
     *
     * @param NDArray $m
     * @return NDArray
     */
    public static function cov(NDArray $m): NDArray
    {
        return Covariance::cov($m);
    }

    /**
     * Return Pearson product-moment correlation coefficients.
     *
     * @param NDArray $x
     * @return NDArray
     */
    public static function corrcoef(NDArray $x): NDArray
    {
        return Corrcoef::corrcoef($x);
    }

    /**
     * Return the Hamming window.
     *
     * @param int $M
     * @return NDArray
     */
    public static function hamming(int $M): NDArray
    {
        return Window::hamming($M);
    }

    /**
     * Return the Hanning window.
     *
     * @param int $M
     * @return NDArray
     */
    public static function hanning(int $M): NDArray
    {
        return Window::hanning($M);
    }

    /**
     * Return the Blackman window.
     *
     * @param int $M
     * @return NDArray
     */
    public static function blackman(int $M): NDArray
    {
        return Window::blackman($M);
    }

    /**
     * Return the Bartlett window.
     *
     * @param int $M
     * @return NDArray
     */
    public static function bartlett(int $M): NDArray
    {
        return Window::bartlett($M);
    }

    /**
     * Least squares polynomial fit.
     *
     * @param NDArray $x
     * @param NDArray $y
     * @param int $deg
     * @return NDArray
     */
    public static function polyfit(NDArray $x, NDArray $y, int $deg): NDArray
    {
        return Polyfit::polyfit($x, $y, $deg);
    }

    /**
     * Return the roots of a polynomial with the given coefficients.
     *
     * @param NDArray|array $p
     * @return NDArray
     */
    public static function roots($p): NDArray
    {
        return Roots::roots($p);
    }

    /**
     * Compute the (Moore-Penrose) pseudo-inverse of a matrix.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function pinv(NDArray $a): NDArray
    {
        return Pinv::pinv($a);
    }

    /**
     * Compute the one-dimensional inverse discrete Fourier Transform.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function ifft(NDArray $a): NDArray
    {
        return IFFT::ifft($a);
    }

    /**
     * Shift the zero-frequency component to the center of the spectrum.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function fftshift(NDArray $a): NDArray
    {
        return FFTShift::fftshift($a);
    }

    /**
     * Compute the q-th quantile of the data.
     *
     * @param NDArray $a
     * @param float $q
     * @return float
     */
    public static function quantile(NDArray $a, float $q): float
    {
        return Quantile::quantile($a, $q);
    }

    /**
     * Compute the histogram of a set of data.
     *
     * @param NDArray $a
     * @param int $bins
     * @return array
     */
    public static function histogram(NDArray $a, int $bins = 10): array
    {
        return Histogram::histogram($a, $bins);
    }

    /**
     * Return the base 10 logarithm of the input, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function log10(NDArray $a): NDArray
    {
        return Log10::log10($a);
    }

    /**
     * Return the base 2 logarithm of the input, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function log2(NDArray $a): NDArray
    {
        return Log2::log2($a);
    }

    /**
     * Calculate exp(x) - 1 for all elements in the array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function expm1(NDArray $a): NDArray
    {
        return Expm1::expm1($a);
    }

    /**
     * Return the natural logarithm of one plus the input array, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function log1p(NDArray $a): NDArray
    {
        return Log1p::log1p($a);
    }

    /**
     * Given the "legs" of a right triangle, return its hypotenuse.
     *
     * @param NDArray $x1
     * @param NDArray $x2
     * @return NDArray
     */
    public static function hypot(NDArray $x1, NDArray $x2): NDArray
    {
        return Hypot::hypot($x1, $x2);
    }

    /**
     * Element-wise arc tangent of x1/x2 choosing the quadrant correctly.
     *
     * @param NDArray $x1
     * @param NDArray $x2
     * @return NDArray
     */
    public static function arctan2(NDArray $x1, NDArray $x2): NDArray
    {
        return Arctan2::arctan2($x1, $x2);
    }

    /**
     * Convert angles from radians to degrees.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function degrees(NDArray $a): NDArray
    {
        return Degrees::degrees($a);
    }

    /**
     * Convert angles from degrees to radians.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function radians(NDArray $a): NDArray
    {
        return Radians::radians($a);
    }

    /**
     * Compute the bit-wise AND of two arrays element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function bitwise_and(NDArray $a, $b): NDArray
    {
        return BitwiseAnd::bitwise_and($a, $b);
    }

    /**
     * Compute the bit-wise OR of two arrays element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function bitwise_or(NDArray $a, $b): NDArray
    {
        return BitwiseOr::bitwise_or($a, $b);
    }

    /**
     * Compute the bit-wise XOR of two arrays element-wise.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function bitwise_xor(NDArray $a, $b): NDArray
    {
        return BitwiseXor::bitwise_xor($a, $b);
    }

    /**
     * Compute bit-wise inversion, or bit-wise NOT, element-wise.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function invert(NDArray $a): NDArray
    {
        return Invert::invert($a);
    }

    /**
     * Shift the bits of an integer to the left.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function left_shift(NDArray $a, $b): NDArray
    {
        return LeftShift::left_shift($a, $b);
    }

    /**
     * Shift the bits of an integer to the right.
     *
     * @param NDArray $a
     * @param mixed $b
     * @return NDArray
     */
    public static function right_shift(NDArray $a, $b): NDArray
    {
        return RightShift::right_shift($a, $b);
    }

    /**
     * Return a contiguous flattened array.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function ravel(NDArray $a): NDArray
    {
        return Ravel::ravel($a);
    }

    /**
     * Trim the leading and/or trailing zeros from a 1-D array.
     *
     * @param NDArray $a
     * @param string $trim
     * @return NDArray
     */
    public static function trim_zeros(NDArray $a, string $trim = 'fb'): NDArray
    {
        return TrimZeros::trim_zeros($a, $trim);
    }

    /**
     * Interchange two axes of an array.
     *
     * @param NDArray $a
     * @param int $axis1
     * @param int $axis2
     * @return NDArray
     */
    public static function swapaxes(NDArray $a, int $axis1, int $axis2): NDArray
    {
        return Swapaxes::swapaxes($a, $axis1, $axis2);
    }

    /**
     * Convert inputs to arrays with at least one dimension.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function atleast_1d(NDArray $a): NDArray
    {
        return Atleast1d::atleast_1d($a);
    }

    /**
     * View inputs as arrays with at least two dimensions.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function atleast_2d(NDArray $a): NDArray
    {
        return Atleast2d::atleast_2d($a);
    }

    /**
     * View inputs as arrays with at least three dimensions.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function atleast_3d(NDArray $a): NDArray
    {
        return Atleast3d::atleast_3d($a);
    }

    /**
     * Range of values (maximum - minimum) along an axis.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return mixed
     */
    public static function ptp(NDArray $a, ?int $axis = null)
    {
        return Ptp::ptp($a, $axis);
    }

    /**
     * Find the indices of array elements that are non-zero, grouped by element.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function argwhere(NDArray $a): NDArray
    {
        return Argwhere::argwhere($a);
    }

    /**
     * Return the indices of the elements that are non-zero.
     *
     * @param NDArray $a
     * @return array
     */
    public static function nonzero(NDArray $a): array
    {
        return Nonzero::nonzero($a);
    }

    /**
     * Find indices where elements should be inserted to maintain order.
     *
     * @param NDArray $a
     * @param mixed $v
     * @return NDArray
     */
    public static function searchsorted(NDArray $a, $v): NDArray
    {
        return Searchsorted::searchsorted($a, $v);
    }

    /**
     * Take elements from an array along an axis.
     *
     * @param NDArray $a
     * @param mixed $indices
     * @param int|null $axis
     * @return NDArray
     */
    public static function take(NDArray $a, $indices, ?int $axis = null): NDArray
    {
        return Take::take($a, $indices, $axis);
    }

    /**
     * Construct an array from an index array and a set of choices.
     *
     * @param NDArray $a
     * @param array $choices
     * @return NDArray
     */
    public static function choose(NDArray $a, array $choices): NDArray
    {
        return Choose::choose($a, $choices);
    }

    /**
     * Return selected slices of an array along given axis.
     *
     * @param NDArray $condition
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function compress(NDArray $condition, NDArray $a, ?int $axis = null): NDArray
    {
        return Compress::compress($condition, $a, $axis);
    }

    /**
     * Returns the indices that would sort an array.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return NDArray
     */
    public static function argsort(NDArray $a, ?int $axis = -1): NDArray
    {
        return Argsort::argsort($a, $axis);
    }

    /**
     * Partially sorts an array.
     *
     * @param NDArray $a
     * @param int $kth
     * @return NDArray
     */
    public static function partition(NDArray $a, int $kth): NDArray
    {
        return Partition::partition($a, $kth);
    }

    /**
     * Indirect partial sort.
     *
     * @param NDArray $a
     * @param int $kth
     * @return NDArray
     */
    public static function argpartition(NDArray $a, int $kth): NDArray
    {
        return Argpartition::argpartition($a, $kth);
    }

    /**
     * Return the minimum of an array, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return mixed
     */
    public static function nanmin(NDArray $a, ?int $axis = null)
    {
        return Nanmin::nanmin($a, $axis);
    }

    /**
     * Return the maximum of an array, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return mixed
     */
    public static function nanmax(NDArray $a, ?int $axis = null)
    {
        return Nanmax::nanmax($a, $axis);
    }

    /**
     * Compute the standard deviation, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanstd(NDArray $a, ?int $axis = null): float
    {
        return Nanstd::nanstd($a, $axis);
    }

    /**
     * Compute the variance, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanvar(NDArray $a, ?int $axis = null): float
    {
        return Nanvar::nanvar($a, $axis);
    }

    /**
     * Compute the median, ignoring NaNs.
     *
     * @param NDArray $a
     * @param int|null $axis
     * @return float
     */
    public static function nanmedian(NDArray $a, ?int $axis = null): float
    {
        return Nanmedian::nanmedian($a, $axis);
    }

    /**
     * Count number of occurrences of each value in an array of non-negative ints.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function bincount(NDArray $a): NDArray
    {
        return Bincount::bincount($a);
    }

    /**
     * Save an array to a text file.
     *
     * @param string $fname
     * @param NDArray $X
     * @param string $delimiter
     */
    public static function savetxt(string $fname, NDArray $X, string $delimiter = ' '): void
    {
        Savetxt::savetxt($fname, $X, $delimiter);
    }

    /**
     * Load data from a text file.
     *
     * @param string $fname
     * @param string $delimiter
     * @return NDArray
     */
    public static function loadtxt(string $fname, string $delimiter = ' '): NDArray
    {
        return Loadtxt::loadtxt($fname, $delimiter);
    }

    /**
     * Create a chararray.
     *
     * @param mixed $items
     * @return NDArray
     */
    public static function char($items): NDArray
    {
        return Char::char($items);
    }

    /**
     * Return a copy of the array with only the first character of each element capitalized.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function capitalize(NDArray $a): NDArray
    {
        return Capitalize::capitalize($a);
    }

    /**
     * Return a copy of the array with its elements centered in a string of length width.
     *
     * @param NDArray $a
     * @param int $width
     * @param string $fillchar
     * @return NDArray
     */
    public static function center(NDArray $a, int $width, string $fillchar = ' '): NDArray
    {
        return Center::center($a, $width, $fillchar);
    }

    /**
     * Return an array with the elements converted to lowercase.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function lower(NDArray $a): NDArray
    {
        return Lower::lower($a);
    }

    /**
     * Return an array with the elements converted to uppercase.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function upper(NDArray $a): NDArray
    {
        return Upper::upper($a);
    }

    /**
     * For each element in a, return a list of the words in the string.
     *
     * @param NDArray $a
     * @param string $sep
     * @return NDArray
     */
    public static function string_split(NDArray $a, string $sep = ' '): NDArray
    {
        return StringSplit::split($a, $sep);
    }

    /**
     * Return a string which is the concatenation of the strings in the sequence.
     *
     * @param string $sep
     * @param NDArray $seq
     * @return string
     */
    public static function join(string $sep, NDArray $seq): string
    {
        return Join::join($sep, $seq);
    }

    public static function can_cast(string $from, string $to): bool
    {
        return CanCast::can_cast($from, $to);
    }

    public static function iscomplex(NDArray $x): NDArray
    {
        return IsComplex::iscomplex($x);
    }

    public static function isreal(NDArray $x): NDArray
    {
        return IsReal::isreal($x);
    }

    /**
     * Machine limits for floating point types.
     *
     * @param string $dtype
     * @return object
     */
    public static function finfo(string $dtype)
    {
        return Finfo::finfo($dtype);
    }

    /**
     * Machine limits for integer types.
     *
     * @param string $dtype
     * @return object
     */
    public static function iinfo(string $dtype)
    {
        return Iinfo::iinfo($dtype);
    }

    /**
     * Returns True if the type of num is a scalar type.
     *
     * @param mixed $num
     * @return bool
     */
    public static function isscalar($num): bool
    {
        return IsScalar::isscalar($num);
    }

    /**
     * Calls str.decode element-wise.
     *
     * @param NDArray $a
     * @param string $encoding
     * @return NDArray
     */
    public static function decode(NDArray $a, string $encoding = 'UTF-8'): NDArray
    {
        return Decode::decode($a, $encoding);
    }

    /**
     * Calls str.encode element-wise.
     *
     * @param NDArray $a
     * @param string $encoding
     * @return NDArray
     */
    public static function encode(NDArray $a, string $encoding = 'UTF-8'): NDArray
    {
        return Encode::encode($a, $encoding);
    }

    /**
     * For each element in a, return a copy of the string with all occurrences of substring old replaced by new.
     *
     * @param NDArray $a
     * @param string $old
     * @param string $new
     * @return NDArray
     */
    public static function replace(NDArray $a, string $old, string $new): NDArray
    {
        return Replace::replace($a, $old, $new);
    }

    /**
     * For each element in a, return a copy with the leading and trailing characters removed.
     *
     * @param NDArray $a
     * @param string $chars
     * @return NDArray
     */
    public static function strip(NDArray $a, string $chars = " \t\n\r\0\x0B"): NDArray
    {
        return Strip::strip($a, $chars);
    }

    /**
     * Change the sign of x1 to that of x2, element-wise.
     *
     * @param NDArray $x1
     * @param NDArray $x2
     * @return NDArray
     */
    public static function copysign(NDArray $x1, NDArray $x2): NDArray
    {
        return Copysign::copysign($x1, $x2);
    }

    /**
     * Unwrap by changing deltas between values to 2*pi complement.
     *
     * @param NDArray $p
     * @return NDArray
     */
    public static function unwrap(NDArray $p): NDArray
    {
        return Unwrap::unwrap($p);
    }

    /**
     * Calculates if each element of an array is also present in a second array.
     *
     * @param NDArray $element
     * @param NDArray $test_elements
     * @return NDArray
     */
    public static function isin(NDArray $element, NDArray $test_elements): NDArray
    {
        return Isin::isin($element, $test_elements);
    }

    /**
     * Return a new array with the same shape and type as a given array.
     *
     * @param NDArray $prototype
     * @return NDArray
     */
    public static function empty_like(NDArray $prototype): NDArray
    {
        return EmptyLike::empty_like($prototype);
    }

    /**
     * Return a full array with the same shape and type as a given array.
     *
     * @param NDArray $prototype
     * @param mixed $fill_value
     * @return NDArray
     */
    public static function full_like(NDArray $prototype, $fill_value): NDArray
    {
        return FullLike::full_like($prototype, $fill_value);
    }

    /**
     * Return an array of ones with the same shape and type as a given array.
     *
     * @param NDArray $prototype
     * @return NDArray
     */
    public static function ones_like(NDArray $prototype): NDArray
    {
        return OnesLike::ones_like($prototype);
    }

    /**
     * Return an array of zeros with the same shape and type as a given array.
     *
     * @param NDArray $prototype
     * @return NDArray
     */
    public static function zeros_like(NDArray $prototype): NDArray
    {
        return ZerosLike::zeros_like($prototype);
    }

    /**
     * Join a sequence of arrays along a new axis.
     *
     * @param array $arrays
     * @param int $axis
     * @return NDArray
     */
    public static function stack(array $arrays, int $axis = 0): NDArray
    {
        return Stack::stack($arrays, $axis);
    }

    /**
     * Stack 1-D arrays as columns into a 2-D array.
     *
     * @param array $tup
     * @return NDArray
     */
    public static function column_stack(array $tup): NDArray
    {
        return ColumnStack::column_stack($tup);
    }

    /**
     * Split an array into multiple sub-arrays horizontally (column-wise).
     *
     * @param NDArray $ary
     * @param int|array $indices_or_sections
     * @return array
     */
    public static function hsplit(NDArray $ary, $indices_or_sections): array
    {
        return Hsplit::hsplit($ary, $indices_or_sections);
    }

    /**
     * Split an array into multiple sub-arrays vertically (row-wise).
     *
     * @param NDArray $ary
     * @param int|array $indices_or_sections
     * @return array
     */
    public static function vsplit(NDArray $ary, $indices_or_sections): array
    {
        return Vsplit::vsplit($ary, $indices_or_sections);
    }

    /**
     * Return the indices of the bins to which each value in input array belongs.
     *
     * @param NDArray $x
     * @param NDArray $bins
     * @return NDArray
     */
    public static function digitize(NDArray $x, NDArray $bins): NDArray
    {
        return Digitize::digitize($x, $bins);
    }

    /**
     * Return the cumulative sum of the elements, treating NaNs as zero.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function nancumsum(NDArray $a): NDArray
    {
        return Nancumsum::nancumsum($a);
    }

    /**
     * Return an array with the elements left-justified.
     *
     * @param NDArray $a
     * @param int $width
     * @param string $fillchar
     * @return NDArray
     */
    public static function ljust(NDArray $a, int $width, string $fillchar = ' '): NDArray
    {
        return Ljust::ljust($a, $width, $fillchar);
    }

    /**
     * Return an array with the elements right-justified.
     *
     * @param NDArray $a
     * @param int $width
     * @param string $fillchar
     * @return NDArray
     */
    public static function rjust(NDArray $a, int $width, string $fillchar = ' '): NDArray
    {
        return Rjust::rjust($a, $width, $fillchar);
    }

    /**
     * For each element, return a titlecased version of the string.
     *
     * @param NDArray $a
     * @return NDArray
     */
    public static function title(NDArray $a): NDArray
    {
        return Title::title($a);
    }

    /**
     * Return an array drawn from elements in choicelist, depending on conditions.
     *
     * @param array $condlist
     * @param array $choicelist
     * @param mixed $default
     * @return NDArray
     */
    public static function select(array $condlist, array $choicelist, $default = 0): NDArray
    {
        return Select::select($condlist, $choicelist, $default);
    }

    public static function arcsinh(NDArray $a): NDArray
    {
        return Arcsinh::arcsinh($a);
    }

    public static function arccosh(NDArray $a): NDArray
    {
        return Arccosh::arccosh($a);
    }

    public static function arctanh(NDArray $a): NDArray
    {
        return Arctanh::arctanh($a);
    }

    public static function sinc(NDArray $a): NDArray
    {
        return Sinc::sinc($a);
    }

    public static function heaviside(NDArray $x1, NDArray $x2): NDArray
    {
        return Heaviside::heaviside($x1, $x2);
    }

    public static function maximum(NDArray $x1, NDArray $x2): NDArray
    {
        return Maximum::maximum($x1, $x2);
    }

    public static function minimum(NDArray $x1, NDArray $x2): NDArray
    {
        return Minimum::minimum($x1, $x2);
    }

    public static function tri(int $N, ?int $M = null, int $k = 0, ?string $dtype = null): NDArray
    {
        return Tri::tri($N, $M, $k, $dtype);
    }

    public static function tril(NDArray $m, int $k = 0): NDArray
    {
        return Tril::tril($m, $k);
    }

    public static function triu(NDArray $m, int $k = 0): NDArray
    {
        return Triu::triu($m, $k);
    }

    public static function vander(NDArray $x, ?int $N = null, bool $increasing = false): NDArray
    {
        return Vander::vander($x, $N, $increasing);
    }

    public static function geomspace(float $start, float $stop, int $num = 50, bool $endpoint = true, ?string $dtype = null): NDArray
    {
        return Geomspace::geomspace($start, $stop, $num, $endpoint, $dtype);
    }

    public static function isclose(NDArray $a, NDArray $b, float $rtol = 1e-05, float $atol = 1e-08, bool $equal_nan = false): NDArray
    {
        return IsClose::isclose($a, $b, $rtol, $atol, $equal_nan);
    }

    public static function allclose(NDArray $a, NDArray $b, float $rtol = 1e-05, float $atol = 1e-08, bool $equal_nan = false): bool
    {
        return AllClose::allclose($a, $b, $rtol, $atol, $equal_nan);
    }

    public static function matrix_power(NDArray $a, int $n): NDArray
    {
        return MatrixPower::matrix_power($a, $n);
    }

    public static function inner(NDArray $a, NDArray $b)
    {
        return Inner::inner($a, $b);
    }

    public static function outer(NDArray $a, NDArray $b): NDArray
    {
        return Outer::outer($a, $b);
    }

    /**
     * Returns the discrete, linear convolution of two one-dimensional sequences.
     */
    public static function convolve(NDArray $a, NDArray $v): NDArray
    {
        return Convolve::convolve($a, $v);
    }

    /**
     * Cross-correlation of two 1-dimensional sequences.
     */
    public static function correlate(NDArray $a, NDArray $v): NDArray
    {
        return Correlate::correlate($a, $v);
    }

    public static function trapezoid(NDArray $y, ?NDArray $x = null, float $dx = 1.0): float
    {
        return Trapezoid::trapezoid($y, $x, $dx);
    }
}
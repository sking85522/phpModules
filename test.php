<?php

// Error reporting ko on karein taaki galtiyan saaf dikhein
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>"; // Browser mein saaf output ke liye
echo "<h1>NumPHP Comprehensive Test Suite</h1>\n";

// Zaroori files ko include karein
require_once __DIR__ . '/modules/index.php';
use NumPHP\NumPHP as np;

// Helper function to print results neatly
function print_test($name, $result) {
    echo "<strong>$name:</strong>\n";
    if (is_object($result) && method_exists($result, 'getData')) {
        print_r($result->getData());
    } else {
        var_dump($result);
    }
    echo "\n<hr>";
}

try {
    // --- 1. Array Creation ---
    echo "<h3>1. Array Creation</h3>";
    print_test("np::array([1, 2, 3])", np::array([1, 2, 3]));
    print_test("np::zeros([2, 2])", np::zeros([2, 2]));
    print_test("np::ones([2, 3])", np::ones([2, 3]));
    print_test("np::full([2, 2], 9)", np::full([2, 2], 9));
    print_test("np::arange(0, 10, 2)", np::arange(0, 10, 2));
    print_test("np::linspace(0, 1, 5)", np::linspace(0, 1, 5));
    print_test("np::eye(3)", np::eye(3));
    print_test("np::tri(3)", np::tri(3));
    print_test("np::tril(np::ones([3,3]))", np::tril(np::ones([3,3])));
    print_test("np::triu(np::ones([3,3]))", np::triu(np::ones([3,3])));
    print_test("np::vander([1, 2, 3], 3)", np::vander(np::array([1, 2, 3]), 3));
    print_test("np::geomspace(1, 1000, 4)", np::geomspace(1, 1000, 4));
    $ones = np::ones([2,2]);
    print_test("np::ones_like", np::ones_like($ones));
    print_test("np::zeros_like", np::zeros_like($ones));
    print_test("np::full_like", np::full_like($ones, 7));

    // --- 2. Mathematics ---
    echo "<h3>2. Basic Mathematics</h3>";
    $a = np::array([10, 20, 30]);
    $b = np::array([1, 2, 3]);
    print_test("Array A", $a);
    print_test("Array B", $b);
    
    print_test("Add (A + B)", np::add($a, $b));
    print_test("Subtract (A - B)", np::subtract($a, $b));
    print_test("Multiply (A * B)", np::multiply($a, $b));
    print_test("Divide (A / B)", np::divide($a, $b));
    print_test("Power (B ^ 2)", np::power($b, 2));
    print_test("Sqrt(A)", np::sqrt($a));
    print_test("Sin(B)", np::sin($b));
    print_test("Exp(B)", np::exp($b));
    print_test("Maximum(A, [15, 15, 35])", np::maximum($a, np::array([15, 15, 35])));
    print_test("Minimum(A, [15, 15, 35])", np::minimum($a, np::array([15, 15, 35])));
    print_test("Sign([-5, 0, 5])", np::sign(np::array([-5, 0, 5])));
    print_test("Negative([1, -1])", np::negative(np::array([1, -1])));
    print_test("Reciprocal([1, 2, 4])", np::reciprocal(np::array([1.0, 2.0, 4.0])));
    print_test("Log10([10, 100])", np::log10(np::array([10, 100])));
    print_test("Log2([2, 8])", np::log2(np::array([2, 8])));
    print_test("Expm1(1e-10)", np::expm1(np::array([1e-10])));
    print_test("Log1p(1e-10)", np::log1p(np::array([1e-10])));
    print_test("Hypot([3], [4])", np::hypot(np::array([3]), np::array([4])));
    print_test("Arctan2([0, 1], [1, 0])", np::arctan2(np::array([0, 1]), np::array([1, 0])));
    print_test("Degrees(PI)", np::degrees(np::array([M_PI])));
    print_test("Radians(180)", np::radians(np::array([180])));
    print_test("Fmod([10, 10], [3, 4])", np::fmod(np::array([10, 10]), np::array([3, 4])));
    print_test("Copysign([1, -1], [-1, 1])", np::copysign(np::array([1, -1]), np::array([-1, 1])));
    print_test("Unwrap phases", np::unwrap(np::array([0.0, 6.0]))); // ~ 0, 2pi-0.28

    // --- 2b. Bitwise Operations ---
    echo "<h3>2b. Bitwise Operations</h3>";
    $bits = np::array([13, 17]); // 1101, 10001
    print_test("Bitwise And(13, 19)", np::bitwise_and(np::array([13]), np::array([19])));
    print_test("Bitwise Or(13, 19)", np::bitwise_or(np::array([13]), np::array([19])));
    print_test("Bitwise Xor(13, 19)", np::bitwise_xor(np::array([13]), np::array([19])));
    print_test("Invert([13])", np::invert(np::array([13])));
    print_test("Left Shift([5], 2)", np::left_shift(np::array([5]), 2));
    print_test("Right Shift([10], 1)", np::right_shift(np::array([10]), 1));

    
    // Scalar Math Test
    echo "<strong>Scalar Math (70 - 45):</strong>\n";
    $scalar_res = np::subtract(np::array(70), np::array(45));
    print_r($scalar_res->getData());
    echo "\n<hr>";

    // --- 2a. Rounding & Clipping ---
    echo "<h3>2a. Rounding & Clipping</h3>";
    $float_arr = np::array([1.1, 2.5, 3.9, -1.4]);
    print_test("Float Array", $float_arr);
    print_test("Round", np::round($float_arr));
    print_test("Floor", np::floor($float_arr));
    print_test("Ceil", np::ceil($float_arr));
    print_test("Clip (between 0 and 3)", np::clip($float_arr, 0, 3));
    print_test("NanToNum([INF, -INF, NAN])", np::nan_to_num(np::array([INF, -INF, NAN])));
    
    // --- 2d. Type Checks ---
    echo "<h3>2d. Type Checks</h3>";
    $check_arr = np::array([1.0, INF, NAN]);
    print_test("IsNan", np::isnan($check_arr));
    print_test("IsInf", np::isinf($check_arr));
    print_test("IsFinite", np::isfinite($check_arr));

    // --- 2e. More Math ---
    echo "<h3>2e. More Math</h3>";
    print_test("Heaviside [-1.5, 0, 2.0]", np::heaviside(np::array([-1.5, 0, 2.0]), np::array([0.5])));

    // --- 2f. Logical Ops ---
    echo "<h3>2f. Logical Operations</h3>";
    print_test("Logical And [T,F,T], [T,T,F]", np::logical_and(np::array([true, false, true]), np::array([true, true, false])));
    print_test("Logical Or [T,F,F], [F,T,F]", np::logical_or(np::array([true, false, false]), np::array([false, true, false])));
    print_test("Logical Not [T,F]", np::logical_not(np::array([true, false])));

    // --- 3. Statistics ---
    echo "<h3>3. Statistics</h3>";
    $stats_arr = np::array([[1, 2, 3], [4, 5, 6]]);
    print_test("Stats Array", $stats_arr);
    print_test("Sum", np::sum($stats_arr));
    print_test("Mean", np::mean($stats_arr));
    print_test("Standard Deviation", np::std($stats_arr));
    print_test("Min", np::min($stats_arr));
    print_test("Max", np::max($stats_arr));
    print_test("Argmax", np::argmax($stats_arr));
    print_test("Argmin", np::argmin($stats_arr));
    print_test("Average (weighted)", np::average(np::array([1, 2, 3, 4]), np::array([4, 3, 2, 1])));
    print_test("Cumsum", np::cumsum(np::array([1,2,3])));
    print_test("Cumprod", np::cumprod(np::array([1,2,3,4])));
    print_test("Median", np::median($stats_arr));
    print_test("Variance", np::var($stats_arr));
    print_test("Percentile (50%)", np::percentile($stats_arr, 50));
    print_test("Quantile (0.5)", np::quantile($stats_arr, 0.5));
    print_test("PTP (Peak to Peak)", np::ptp($stats_arr));
    print_test("Covariance", np::cov($stats_arr));
    print_test("Corrcoef", np::corrcoef($stats_arr));
    print_test("Histogram", np::histogram(np::array([1, 2, 1]), 2)); // Should return [counts, bins]
    print_test("Digitize", np::digitize(np::array([0.2, 6.4, 3.0, 1.6]), np::array([0.0, 1.0, 2.5, 4.0, 10.0])));
    print_test("Bincount", np::bincount(np::array([0, 1, 1, 3, 2, 1, 7])));

    // --- 3b. NaN Statistics ---
    echo "<h3>3b. NaN Statistics</h3>";
    $nan_arr = np::array([1.0, NAN, 3.0, 4.0]);
    print_test("NanSum", np::nansum($nan_arr));
    print_test("NanMean", np::nanmean($nan_arr));
    print_test("NanMin", np::nanmin($nan_arr));
    print_test("NanMax", np::nanmax($nan_arr));
    print_test("NanStd", np::nanstd($nan_arr));
    print_test("NanVar", np::nanvar($nan_arr));
    print_test("NanMedian", np::nanmedian($nan_arr));
    print_test("NanCumsum", np::nancumsum($nan_arr));

    // --- 4. Linear Algebra ---
    echo "<h3>4. Linear Algebra</h3>";
    $m1 = np::array([[1, 2], [3, 4]]);
    $m2 = np::array([[5, 6], [7, 8]]);
    
    print_test("Matrix 1", $m1);
    print_test("Matrix 2", $m2);
    print_test("Matmul (Matrix Product)", np::matmul($m1, $m2));
    print_test("Dot Product", np::dot($m1, $m2));
    print_test("Transpose", np::transpose($m1));
    print_test("Determinant", np::det($m1));
    print_test("Diagonal", np::diag($m1));
    print_test("Trace", np::trace($m1));
    print_test("Inverse", np::inv($m1));
    print_test("Matrix Power (m1^2)", np::matrix_power($m1, 2));
    print_test("Inner Product", np::inner(np::array([1,2,3]), np::array([0,1,0])));
    print_test("Outer Product", np::outer(np::array([1,2,3]), np::array([4,5,6])));
    print_test("Kron (Kronecker)", np::kron(np::eye(2), np::ones([2,2])));
    print_test("Norm", np::norm(np::array([3, 4])));
    // Solve: 3x0 + x1 = 9, x0 + 2x1 = 8 -> x0=2, x1=3
    $coeff = np::array([[3, 1], [1, 2]]);
    $dep = np::array([9, 8]);
    print_test("Solve (Linear Eq)", np::solve($coeff, $dep));

    // --- 4a. Logic & Indexing ---
    echo "<h3>4a. Logic & Indexing</h3>";
    $logic_arr = np::array([1, 2, 3, 4, 5]);
    print_test("Logic Array", $logic_arr);
    print_test("Where > 3, replace with 99, else keep original", np::where(np::greater($logic_arr, 3), 99, $logic_arr));
    $set_arr = np::array([1, 5, 9]);
    print_test("Isin [1, 5, 9]?", np::isin($logic_arr, $set_arr));
    print_test("Argwhere (>3)", np::argwhere(np::greater($logic_arr, 3)));
    print_test("Nonzero", np::nonzero($logic_arr));
    print_test("Searchsorted ([1,2,3,4,5], 3)", np::searchsorted($logic_arr, 3));
    print_test("Take indices [0, 4]", np::take($logic_arr, [0, 4]));
    print_test("Select (>3)", np::select([np::greater($logic_arr, 3)], [np::full_like($logic_arr, 99)], 0));
    print_test("AllClose", np::allclose(np::array([1e-10, 1e-10]), np::array([1.00001e-10, 1e-10]), 1e-05, 1e-08));
    print_test("IsClose", np::isclose(np::array([1e-10, 1e-10]), np::array([1.00001e-10, 1e-10])));
    print_test("Choose", np::choose(np::array([0, 1, 0]), [np::array([10, 11, 12]), np::array([20, 21, 22])]));
    print_test("Compress", np::compress(np::array([true, false, true]), np::array(['A', 'B', 'C'])));
    $diag_arr = np::arange(9)->reshape([3,3]);
    np::fill_diagonal($diag_arr, 5);
    print_test("Fill Diagonal", $diag_arr);

    // --- 5. Array Manipulation ---
    echo "<h3>5. Array Manipulation</h3>";
    // Using explicit array to ensure exactly 6 elements for reshape (2x3)
    $flat = np::array([0, 1, 2, 3, 4, 5]);
    print_test("Original (0-5)", $flat);
    
    $reshaped = np::reshape($flat, [2, 3]);
    print_test("Reshape to 2x3", $reshaped);
    
    print_test("Flatten back", np::flatten($reshaped));
    
    $c1 = np::array([1, 2]);
    $c2 = np::array([3, 4]);
    print_test("Concatenate [1,2] & [3,4]", np::concatenate([$c1, $c2]));
    print_test("Vstack", np::vstack([$c1, $c2]));
    print_test("Hstack", np::hstack([$c1, $c2]));
    print_test("Flip", np::flip($c1));
    print_test("Tile [1,2] 3 times", np::tile($c1, 3));
    print_test("Repeat [1,2] 3 times", np::repeat($c1, 3));
    print_test("Roll [0,1,2,3,4,5] by 2", np::roll($flat, 2));
    print_test("Pad [1,2,3] with 2 zeros", np::pad(np::array([1,2,3]), 2));
    print_test("Expand Dims", np::expand_dims($c1, 0));
    print_test("Squeeze", np::squeeze(np::array([[1, 2, 3]])));
    print_test("Append", np::append($c1, 5));
    print_test("Insert", np::insert($c1, 1, 99));
    print_test("Delete", np::delete($c1, 0));
    print_test("Trim Zeros", np::trim_zeros(np::array([0, 0, 1, 2, 3, 0])));
    print_test("Ravel", np::ravel($reshaped));
    print_test("Swapaxes", np::swapaxes($reshaped, 0, 1));
    print_test("Stack", np::stack([$c1, $c2]));
    print_test("Column Stack", np::column_stack([$c1, $c2]));
    $split_arr = np::arange(9);
    print_test("Hsplit", np::hsplit($reshaped, 3));
    print_test("Vsplit", np::vsplit($reshaped, 2));

    // --- 6. Advanced Features ---
   // --- 6. Advanced Features ---
    echo "<h3>6. Advanced & Signal Processing</h3>";
    $sig = np::array([1, 2, 3]);
    $win = np::array([0, 1, 0.5]);
    print_test("Convolve", np::convolve($sig, $win));
    print_test("Sinc function", np::sinc(np::linspace(-2, 2, 5)));
    
    $x_calc = np::linspace(0, 1, 11);
    $y_calc = np::power($x_calc, 2);
    echo "<strong>Trapezoid Integration (x^2, 0 to 1):</strong> " . np::trapezoid($y_calc, $x_calc) . "\n<hr>";
    print_test("Gradient", np::gradient(np::array([1, 2, 4, 7, 11, 16]))); // dy/dx
    print_test("Correlate", np::correlate(np::array([1, 2, 3]), np::array([0, 1, 0.5])));
    // Polynomials: p(x) = x^2 - 2x + 1. Roots at x=1, 1.
    print_test("Polyval (p(2))", np::polyval([1, -2, 1], 2)); 
    print_test("Roots", np::roots([1, -2, 1]));
    // Fit line to (0,0), (1,1), (2,2) -> y=x, so [1, 0]
    print_test("Polyfit", np::polyfit(np::array([0, 1, 2]), np::array([0, 1, 2]), 1));
    
    // --- 6b. FFT & Windows ---
    echo "<h3>6b. FFT & Windows</h3>";
    $fft_sig = np::array([1.0, 1.0, 1.0, 1.0, 0.0, 0.0, 0.0, 0.0]);
    // print_test("FFT", np::fft($fft_sig)); // Placeholder, will throw exception
    print_test("FFTShift", np::fftshift(np::arange(8)));
    print_test("Hamming Window (M=5)", np::hamming(5));

    // --- 7. Set Operations ---
    echo "<h3>7. Set Operations</h3>";
    $set1 = np::array([1, 2, 3, 4, 5]);
    $set2 = np::array([4, 5, 6, 7, 8]);
    print_test("Set 1", $set1);
    print_test("Set 2", $set2);
    print_test("Unique [1,1,2,3,3,3]", np::unique(np::array([1,1,2,3,3,3])));
    print_test("Intersect (Set1, Set2)", np::intersect1d($set1, $set2));
    print_test("Union (Set1, Set2)", np::union1d($set1, $set2));
    print_test("Set Difference (Set1 - Set2)", np::setdiff1d($set1, $set2));

    // --- 8. String Operations ---
    echo "<h3>8. String Operations</h3>";
    $str_arr = np::array(['  Hello', 'World  ']);
    print_test("Original Strings", $str_arr);
    print_test("Lower", np::lower($str_arr));
    print_test("Upper", np::upper($str_arr));
    print_test("Strip", np::strip($str_arr));
    print_test("Replace (l->L)", np::replace($str_arr, 'l', 'L'));
    print_test("Center", np::center(np::array(['a', 'b']), 5, '-'));
    print_test("Join", np::join(',', $str_arr));
    print_test("Capitalize", np::capitalize(np::array(['hello world'])));
    print_test("Ljust", np::ljust(np::array(['a']), 5, '-'));
    print_test("Rjust", np::rjust(np::array(['a']), 5, '-'));
    print_test("Title", np::title(np::array(['hello world'])));

    // --- 9. Random & Sorting ---
    echo "<h3>9. Random & Sorting</h3>";
    np::seed(42);
    print_test("Rand (2x2)", np::rand([2, 2]));
    print_test("Randn (2)", np::randn([2]));
    print_test("Choice", np::choice(np::array([10, 20, 30, 40]), 2));
    print_test("Sort [3, 1, 2]", np::sort(np::array([3, 1, 2])));
    print_test("Argsort [3, 1, 2]", np::argsort(np::array([3, 1, 2])));
    print_test("Partition [3,4,2,1] at 2", np::partition(np::array([3,4,2,1]), 2));
    print_test("Argpartition [3,4,2,1] at 2", np::argpartition(np::array([3,4,2,1]), 2));
    $shuf = np::arange(5);
    np::shuffle($shuf);
    print_test("Shuffle (seeded)", $shuf);
    print_test("Permutation (seeded)", np::permutation(5));

    // --- 10. Type Info ---
    echo "<h3>10. Type Info</h3>";
    print_test("IsScalar(5)", np::isscalar(5));
    print_test("IsScalar(np::array(5))", np::isscalar(np::array(5)));

    // --- 11. IO ---
    echo "<h3>11. IO</h3>";
    $io_arr = np::array([[1,2,3],[4,5,6]]);
    np::savetxt('test.txt', $io_arr);
    print_test("LoadTxt", np::loadtxt('test.txt'));
    unlink('test.txt'); // clean up
    print_test("FromFunction (i*j)", np::fromfunction(function($i, $j) { return $i * $j; }, [3, 3]));
    $iter = new \ArrayIterator([1, 2, 3]);
    print_test("FromIter", np::fromiter($iter, 'int'));

} catch (Exception $e) {
    echo "<h3 style='color:red'>Error: " . $e->getMessage() . "</h3>\n";
    echo $e->getTraceAsString();
}

echo "\nTest Script Finished.\n";
echo "</pre>";
?>
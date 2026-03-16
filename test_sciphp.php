<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
echo "SciPHP Test Script Start...\n\n";

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/sciphp/autoload.php';
require_once __DIR__ . '/modules/sciphp/SciPHP.php';

// Include the class files manually for this test script
require_once __DIR__ . '/modules/sciphp/src/Optimization/Minimize.php';
require_once __DIR__ . '/modules/sciphp/src/Optimization/RootFinding.php';
require_once __DIR__ . '/modules/sciphp/src/Integration/Quad.php';
require_once __DIR__ . '/modules/sciphp/src/Interpolation/Linear.php';
require_once __DIR__ . '/modules/sciphp/src/LinearAlgebra/Linalg.php';
require_once __DIR__ . '/modules/sciphp/src/LinearAlgebra/AdvancedLinalg.php';
require_once __DIR__ . '/modules/sciphp/src/Statistics/NormalDist.php';
require_once __DIR__ . '/modules/sciphp/src/Signal/Convolve.php';

use NumPHP\NumPHP as np;
use SciPHP\SciPHP as sp;

try {
    echo "--- Testing sp::optimize_minimize() ---\n";
    $func1 = function($x) { return ($x[0] * $x[0]) + (5 * $x[0]) + 6; };
    print_r(sp::optimize_minimize($func1, [0.0]));

    echo "\n--- Testing sp::optimize_newton() ---\n";
    // Find root of x^3 - 2x - 5 = 0
    $func2 = function($x) { return $x * $x * $x - 2 * $x - 5; };
    $fprime2 = function($x) { return 3 * $x * $x - 2; };
    $root = sp::optimize_newton($func2, 2.0, $fprime2);
    echo "Root found at: $root\n";

    echo "\n--- Testing sp::integrate_quad() ---\n";
    $func3 = function($x) { return $x * $x; };
    print_r(sp::integrate_quad($func3, 0, 1));

    echo "\n--- Testing sp::interpolate_interp1d() ---\n";
    $f = sp::interpolate_interp1d(np::array([0, 1, 2]), np::array([0, 2, 4]));
    echo "Interpolate at x=1.5: " . $f(1.5) . "\n";

    echo "\n--- Testing sp::linalg_solve() ---\n";
    $sol = sp::linalg_solve(np::array([[3, 2], [-1, 2]]), np::array([18, 2]));
    print_r($sol->getData());

    echo "\n--- Testing sp::linalg_inv() ---\n";
    $A = np::array([[4, 7], [2, 6]]);
    $A_inv = sp::linalg_inv($A);
    echo "Inverse of A:\n";
    print_r($A_inv->getData());

    echo "\n--- Testing sp::stats_norm_pdf() & cdf() ---\n";
    echo "PDF at x=0 (mean=0, std=1): " . sp::stats_norm_pdf(0.0) . "\n";
    echo "CDF at x=0 (mean=0, std=1): " . sp::stats_norm_cdf(0.0) . "\n";
    echo "CDF at x=1.96 (mean=0, std=1): " . sp::stats_norm_cdf(1.96) . "\n";

    echo "\n--- Testing sp::signal_convolve() ---\n";
    $sig = np::array([1, 2, 3]);
    $win = np::array([0, 1, 0.5]);
    $conv = sp::signal_convolve($sig, $win);
    echo "Convolve Result:\n";
    print_r($conv->getData());

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nSciPHP Test Script End.\n";
echo "</pre>";

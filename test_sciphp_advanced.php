<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/sciphp/autoload.php';
require_once __DIR__ . '/modules/sciphp/SciPHP.php';

// Include manually if needed
require_once __DIR__ . '/modules/sciphp/src/Spatial/Distance.php';
require_once __DIR__ . '/modules/sciphp/src/Special/Special.php';
require_once __DIR__ . '/modules/sciphp/src/Fft/Fft.php';
require_once __DIR__ . '/modules/sciphp/src/Stats/Stats.php';
require_once __DIR__ . '/modules/sciphp/src/Linalg/Basic.php';

use NumPHP\NumPHP as np;
use SciPHP\SciPHP as sp;

echo "<pre>";
echo "SciPHP Advanced Features Test...\n\n";

try {
    echo "--- 1. Spatial Distances ---\n";
    $u = [1, 0, 0];
    $v = [0, 1, 0];
    echo "Euclidean: " . sp::spatial_distance_euclidean($u, $v) . "\n";
    echo "Cityblock: " . sp::spatial_distance_cityblock($u, $v) . "\n";
    echo "Cosine: " . sp::spatial_distance_cosine($u, $v) . "\n";

    echo "\n--- 2. Special Functions ---\n";
    echo "Gamma(5): " . sp::special_gamma(5) . " (Expected ~24)\n"; // 4!
    echo "Comb(5, 2): " . sp::special_comb(5, 2) . " (Expected 10)\n";
    echo "Erf(0.5): " . sp::special_erf(0.5) . " (Expected ~0.52)\n";

    echo "\n--- 3. Stats ---\n";
    $data = [1, 2, 2, 3, 4, 4, 4, 5, 6];
    echo "Mean: " . sp::stats_mean($data) . "\n";
    echo "Median: " . sp::stats_median($data) . "\n";
    $modeInfo = sp::stats_mode($data);
    echo "Mode: " . implode(',', $modeInfo['mode']) . " (Count: {$modeInfo['count']})\n";
    echo "Variance: " . sp::stats_variance($data) . "\n";
    echo "Skewness: " . sp::stats_skew($data) . "\n";
    echo "Pearsonr: \n";
    print_r(sp::stats_pearsonr([1, 2, 3], [2, 4, 6]));

    echo "\n--- 4. Fast Fourier Transform (FFT) ---\n";
    $signal = [1.0, 1.0, 1.0, 1.0, 0.0, 0.0, 0.0, 0.0];
    $fft_result = sp::fft_fft($signal);
    echo "FFT Result (first 4 bins [Real, Imag]):\n";
    for ($i=0; $i<4; $i++) {
        echo "Bin $i: " . round($fft_result[$i][0], 2) . " + " . round($fft_result[$i][1], 2) . "i\n";
    }

    echo "\n--- 5. Linear Algebra ---\n";
    $mat = [[1, 2], [3, 4]];
    echo "Trace: " . sp::linalg_trace($mat) . " (Expected 5)\n";
    echo "Norm (L2): " . sp::linalg_norm($mat, 2) . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nSciPHP Advanced Test End.\n";
echo "</pre>";

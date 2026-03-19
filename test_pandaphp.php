<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/pandaphp/autoload.php';
require_once __DIR__ . '/modules/pandaphp/PandaPHP.php';
require_once __DIR__ . '/modules/pandaphp/src/Core/Series.php';
require_once __DIR__ . '/modules/pandaphp/src/Core/DataFrame.php';

use NumPHP\NumPHP as np;
use PandaPHP\PandaPHP as pd;

echo "<pre>";
echo "PandaPHP Test Script Start...\n\n";

try {
    echo "--- Testing pd::Series ---\n";
    $s = pd::Series([1, 3, 5, null, 6, 8]);
    echo $s . "\n";

    echo "--- Testing pd::DataFrame from dictionary ---\n";
    $data = [
        'name' => ['Alice', 'Bob', 'Charlie', 'David'],
        'age' => [25, 30, 35, 40],
        'score' => [85.5, 90.0, 95.5, 88.0]
    ];
    $df = pd::DataFrame($data);
    echo $df . "\n";

    echo "--- Testing df->describe() ---\n";
    echo $df->describe() . "\n";

    echo "--- Testing df->head(2) ---\n";
    echo $df->head(2) . "\n";

    echo "--- Testing df->tail(2) ---\n";
    echo $df->tail(2) . "\n";

    echo "--- Testing Accessing a Column (Series) ---\n";
    echo $df->getColumn('age') . "\n";

    // Test IO
    echo "--- Testing IO to_csv and read_csv ---\n";
    $df->to_csv('test_output.csv');
    echo "test_output.csv written.\n";

    $df_read = pd::read_csv('test_output.csv');
    echo "Read from test_output.csv:\n";
    echo $df_read . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "PandaPHP Test Script End.\n";
echo "</pre>";

<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/parallelphp/autoload.php';
require_once __DIR__ . '/modules/parallelphp/ParallelPHP.php';
require_once __DIR__ . '/modules/parallelphp/src/Core/Pool.php';

use ParallelPHP\ParallelPHP as prll;

echo "<pre>";
echo "ParallelPHP Test Script Start...\n\n";

// 1. Define a global HeavyWorker class with a static method so the worker process can find it easily
class HeavyWorker {
    public static function calculateMatrix(int $size, int $id) {
        $sum = 0;
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size; $j++) {
                $sum += sqrt($i * $j) + sin($i) * cos($j);
            }
        }
        usleep(500000); // simulate delay 0.5s
        return "Task $id finished. Sum: " . round($sum, 2);
    }
}

try {
    echo "--- Testing Parallel Execution (Pool Size: 4) ---\n";
    $start_time = microtime(true);

    $pool = prll::Pool(4);

    $taskIds = [];
    for ($i = 0; $i < 8; $i++) {
        // Pass the static method reference
        $taskIds[] = $pool->submit(['HeavyWorker', 'calculateMatrix'], [1000, $i]);
        echo "Submitted Task $i\n";
    }

    echo "Waiting for tasks to finish...\n";
    $results = $pool->wait();

    $end_time = microtime(true);
    $total_time = round($end_time - $start_time, 2);

    foreach ($results as $id => $result) {
        if (is_array($result) && isset($result['error'])) {
            echo "Task $id Error: " . $result['error'] . "\n";
        } else {
            echo "Task $id Output: " . $result . "\n";
        }
    }

    echo "\nTotal Time Taken: $total_time seconds\n";
    echo "(Note: Sequential execution of 8 tasks taking >0.5s each would take > 4 seconds. Since pool size is 4, it should take ~1 second.)\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nParallelPHP Test Script End.\n";
echo "</pre>";

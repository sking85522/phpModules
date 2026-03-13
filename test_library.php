<?php

// Simple test script for NumPHP library

require_once __DIR__ . '/modules/numphp/autoload.php';

use NumPHP\NumPHP as np;

echo "--- NumPHP Library Test Script ---\n\n";

// 1. Array Creation
echo "1. Creating a 2x3 array:\n";
$a = np::array([[1, 2, 3], [4, 5, 6]]);
print_r($a->getData());
echo "Shape: " . json_encode($a->getShape()) . "\n\n";

// 2. Matrix Multiplication
echo "2. Matrix Multiplication:\n";
$b = np::array([[7, 8], [9, 10], [11, 12]]);
$c = np::matmul($a, $b);
echo "Result of matmul(a, b):\n";
print_r($c->getData());
echo "Shape: " . json_encode($c->getShape()) . "\n\n";

// 3. Comparison and `where`
echo "3. Using comparison and `where`:\n";
$data = np::arange(10);
echo "Original data: " . json_encode($data->getData()) . "\n";

// Create a condition: elements greater than 5
$condition = np::greater($data, 5);
echo "Condition (data > 5): " . json_encode($condition->getData()) . "\n";

// Use `where` to replace values: if condition is true, use value from `data`, otherwise use -1
$result = np::where($condition, $data, -1);
echo "Result of where(condition, data, -1):\n";
print_r($result->getData());
echo "\n--- Test Complete ---\n";

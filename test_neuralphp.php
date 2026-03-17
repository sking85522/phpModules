<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/neuralphp/autoload.php';
require_once __DIR__ . '/modules/neuralphp/NeuralPHP.php';

use NeuralPHP\NeuralPHP as nn;

echo "<pre>";
echo "NeuralPHP Test Script Start...\n\n";

try {
    echo "--- Solving the XOR Problem with a Neural Network ---\n";
    // XOR Truth Table
    // Input 1 | Input 2 | Output
    //    0    |    0    |    0
    //    0    |    1    |    1
    //    1    |    0    |    1
    //    1    |    1    |    0

    $X_train = [
        [0, 0],
        [0, 1],
        [1, 0],
        [1, 1]
    ];

    $y_train = [
        [0],
        [1],
        [1],
        [0]
    ];

    // Build the Model
    $model = nn::Sequential();

    // Hidden Layer: 2 inputs -> 4 neurons (with Sigmoid)
    $model->add(nn::Dense(2, 4, 'sigmoid'));

    // Output Layer: 4 inputs -> 1 output (with Sigmoid)
    $model->add(nn::Dense(4, 1, 'sigmoid'));

    // Compile Model with SGD Optimizer and MSE Loss
    $model->compile('sgd', 0.5, 'mse'); // High learning rate for fast convergence

    // Train the Model
    echo "Training the model for 10000 epochs...\n";
    $model->fit($X_train, $y_train, 10000);
    echo "Training Complete.\n\n";

    // Test the Model
    echo "Predictions:\n";
    $predictions = $model->predict($X_train);

    for ($i = 0; $i < count($X_train); $i++) {
        $input_str = implode(", ", $X_train[$i]);
        $expected = $y_train[$i][0];
        $predicted = number_format($predictions[$i][0], 4);

        $class = ($predictions[$i][0] > 0.5) ? 1 : 0;

        echo "Input: [$input_str] | Expected: $expected | Predicted: $predicted (Class: $class)\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nNeuralPHP Test Script End.\n";
echo "</pre>";

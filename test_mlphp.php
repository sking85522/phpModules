<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/mlphp/autoload.php';
require_once __DIR__ . '/modules/mlphp/MLPHP.php';
// Load manually just in case
require_once __DIR__ . '/modules/mlphp/src/LinearModel/LinearRegression.php';
require_once __DIR__ . '/modules/mlphp/src/LinearModel/LogisticRegression.php';
require_once __DIR__ . '/modules/mlphp/src/Cluster/KMeans.php';
require_once __DIR__ . '/modules/mlphp/src/Metrics/RegressionMetrics.php';
require_once __DIR__ . '/modules/mlphp/src/Metrics/ClassificationMetrics.php';
require_once __DIR__ . '/modules/mlphp/src/PreProcessing/StandardScaler.php';

use NumPHP\NumPHP as np;
use MLPHP\MLPHP as ml;

echo "<pre>";
echo "MLPHP Test Script Start...\n\n";

try {
    echo "--- Testing Linear Regression ---\n";
    // Avoid perfect collinearity (X1=X2) which causes singular matrix in normal equations.
    // y = 2x1 + 3x2 + 5
    $X_lin = np::array([
        [1, 2],
        [2, 3],
        [3, 1],
        [4, 5]
    ]);
    // y = 2(X1) + 3(X2) + 5
    $y_lin = np::array([13, 18, 14, 28]);

    $lin_reg = ml::LinearRegression();
    $lin_reg->fit($X_lin, $y_lin);

    $X_test = np::array([[5, 4]]);
    // Expected y = 2(5) + 3(4) + 5 = 27
    $y_pred = $lin_reg->predict($X_test);
    echo "Predictions for [[5, 4]]: \n";
    print_r($y_pred->getData());
    echo "Coefficients (expected ~ [2, 3]): \n";
    print_r($lin_reg->getCoef());
    echo "Intercept (expected ~ 5): " . $lin_reg->getIntercept() . "\n";


    echo "\n--- Testing Logistic Regression ---\n";
    // Binary classification
    $X_log = np::array([
        [1, 5], [2, 4], [3, 6], [2, 2], // Class 0 (Fail)
        [8, 7], [9, 8], [7, 6], [10, 7] // Class 1 (Pass)
    ]);
    $y_log = np::array([0, 0, 0, 0, 1, 1, 1, 1]);

    // Scale data for better GD convergence
    $scaler = ml::StandardScaler();
    $X_scaled = $scaler->fit_transform($X_log);

    $log_reg = ml::LogisticRegression(1.0, 500); // learning rate, epochs
    $log_reg->fit($X_scaled, $y_log);

    $preds = $log_reg->predict($X_scaled);
    echo "Logistic Regression Predictions:\n";
    print_r($preds->getData());
    echo "Accuracy: " . ml::accuracy_score($y_log, $preds) * 100 . "%\n";


    echo "\n--- Testing K-Means Clustering ---\n";
    // Two clear clusters
    $X_cluster = np::array([
        [1, 2], [1, 4], [1, 0], // cluster 1
        [10, 2], [10, 4], [10, 0] // cluster 2
    ]);

    $kmeans = ml::KMeans(2, 100);
    $kmeans->fit($X_cluster);

    $cluster_labels = $kmeans->predict($X_cluster);
    echo "K-Means Cluster Labels (2 clusters expected):\n";
    print_r($cluster_labels->getData());

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nMLPHP Test Script End.\n";
echo "</pre>";

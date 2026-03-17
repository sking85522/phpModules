<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php'; // Required for MLPHP array dependencies
require_once __DIR__ . '/modules/mlphp/autoload.php';
require_once __DIR__ . '/modules/datasetphp/autoload.php';
require_once __DIR__ . '/modules/modelio/autoload.php';

require_once __DIR__ . '/modules/mlphp/MLPHP.php';
require_once __DIR__ . '/modules/datasetphp/DatasetPHP.php';
require_once __DIR__ . '/modules/modelio/ModelIO.php';

use DatasetPHP\DatasetPHP;
use MLPHP\MLPHP;
use ModelIO\ModelIO;

echo "<pre>";
echo "Testing DatasetPHP & ModelIO Start...\n\n";

try {
    echo "--- 1. Testing DatasetPHP (Loading CSV) ---\n";
    $dataset = DatasetPHP::load_csv('dummy_data.csv', 'price');
    echo "Loaded " . count($dataset['X']) . " samples.\n";
    echo "First Feature Row: "; print_r($dataset['X'][0]);
    echo "First Target Label: " . $dataset['y'][0] . "\n\n";

    echo "--- 2. Testing DatasetPHP (Train/Test Split) ---\n";
    list($X_train, $X_test, $y_train, $y_test) = DatasetPHP::train_test_split($dataset['X'], $dataset['y'], 0.3); // 30% test size
    echo "Train Size: " . count($X_train) . ", Test Size: " . count($X_test) . "\n\n";

    echo "--- 3. Training a Model (MLPHP Linear Regression) ---\n";
    $model = MLPHP::LinearRegression();
    $model->fit($X_train, $y_train);

    // Quick prediction to ensure it works before saving
    $pred_before = $model->predict([$X_test[0]]);
    echo "Prediction BEFORE save for features [" . implode(",", $X_test[0]) . "]: " . $pred_before->getData()[0] . "\n\n";

    echo "--- 4. Testing ModelIO (Saving the Model) ---\n";
    $model_file = 'linear_model.pkl';
    ModelIO::save($model, $model_file);
    echo "Model saved to $model_file. File size: " . filesize($model_file) . " bytes\n\n";

    echo "--- 5. Testing ModelIO (Loading the Model) ---\n";
    $loaded_model = ModelIO::load($model_file);
    echo "Model loaded successfully.\n";

    echo "--- 6. Verifying Loaded Model State ---\n";
    // Check if prediction is identical to before saving
    $pred_after = $loaded_model->predict([$X_test[0]]);
    echo "Prediction AFTER load for features [" . implode(",", $X_test[0]) . "]: " . $pred_after->getData()[0] . "\n\n";

    if (abs($pred_before->getData()[0] - $pred_after->getData()[0]) < 0.0001) {
        echo "✅ SUCCESS: The loaded model preserved its weights and biases accurately!\n";
    } else {
        echo "❌ ERROR: Model state was not preserved.\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nTesting DatasetPHP & ModelIO End.\n";
echo "</pre>";

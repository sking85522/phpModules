<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/visionphp/autoload.php';
require_once __DIR__ . '/modules/visionphp/VisionPHP.php';
require_once __DIR__ . '/modules/visionphp/src/Core/Image.php';
require_once __DIR__ . '/modules/visionphp/src/Filters/Grayscale.php';
require_once __DIR__ . '/modules/visionphp/src/Filters/Blur.php';
require_once __DIR__ . '/modules/visionphp/src/Features/EdgeDetection.php';

use VisionPHP\VisionPHP as cv;

echo "<pre>";
echo "VisionPHP Test Script Start...\n\n";

try {
    // 1. Create a dummy test image since we don't have a file to load
    echo "Creating a dummy image...\n";
    $img = cv::create(200, 200);
    $res = $img->getResource();

    // Draw something colorful
    $red = imagecolorallocate($res, 255, 0, 0);
    $blue = imagecolorallocate($res, 0, 0, 255);
    imagefilledrectangle($res, 50, 50, 150, 150, $red);
    imagefilledellipse($res, 100, 100, 80, 80, $blue);

    cv::imwrite("test_original.jpg", $img);
    echo "Saved test_original.jpg\n";

    // 2. Grayscale Conversion
    echo "Converting to grayscale...\n";
    $gray = cv::cvtColor($img, 'GRAY');
    cv::imwrite("test_gray.jpg", $gray);
    echo "Saved test_gray.jpg\n";

    // 3. Gaussian Blur
    echo "Applying Gaussian Blur...\n";
    $blurred = cv::GaussianBlur($img, 10);
    cv::imwrite("test_blur.jpg", $blurred);
    echo "Saved test_blur.jpg\n";

    // 4. Edge Detection
    echo "Detecting edges...\n";
    $edges = cv::Sobel($img);
    cv::imwrite("test_edges.jpg", $edges);
    echo "Saved test_edges.jpg\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nVisionPHP Test Script End.\n";
echo "</pre>";

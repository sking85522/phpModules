<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/plotphp/autoload.php';
require_once __DIR__ . '/modules/plotphp/PlotPHP.php';
// Include classes manually for this standalone test script if the autoloader fails
require_once __DIR__ . '/modules/plotphp/src/Core/Figure.php';
require_once __DIR__ . '/modules/plotphp/src/Render/SVGRenderer.php';

use NumPHP\NumPHP as np;
use PlotPHP\PlotPHP as plt;

echo "Generating Plots...\n";

// 1. Line Plot
$x = np::linspace(0, 10, 100);
$y = np::sin($x);

plt::plot($x, $y, 'blue', 2);
plt::title('Sine Wave');
plt::xlabel('Time (s)');
plt::ylabel('Amplitude');
plt::grid(true);
plt::savefig('plot_line.svg');
echo "plot_line.svg generated.\n";
plt::clf(); // Clear figure

// 2. Scatter Plot
// If np::random() doesn't return an object with a rand() method, let's use standard PHP logic
$x_data = [];
$y_data = [];
for ($i=0; $i<50; $i++) {
    $x_data[] = mt_rand(0, 100) / 100;
    $y_data[] = mt_rand(0, 100) / 100;
}
$x = np::array($x_data);
$y = np::array($y_data);

plt::scatter($x, $y, 5, 'red');
plt::title('Random Scatter Plot');
plt::xlabel('X Axis');
plt::ylabel('Y Axis');
plt::grid(true);
plt::savefig('plot_scatter.svg');
echo "plot_scatter.svg generated.\n";
plt::clf();

// 3. Bar Chart
$categories = np::array([1, 2, 3, 4, 5]);
$values = np::array([10, 15, 7, 12, 20]);
plt::bar($categories, $values, 0.6, 'green');
plt::title('Bar Chart Example');
plt::xlabel('Category');
plt::ylabel('Value');
plt::grid(false);
plt::savefig('plot_bar.svg');
echo "plot_bar.svg generated.\n";
plt::clf();

echo "Done!\n";

<?php

// Error reporting ko on karein taaki galtiyan saaf dikhein
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>"; // Browser mein saaf output ke liye

echo "NumPHP Test Script Start...\n\n";

// Zaroori files ko include karein
require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
// NumPHP ke liye ek chhota naam (alias) banayein
use NumPHP\NumPHP as np;

try {
    echo "--- Testing np::add() ---\n";

    // Do array banayein
    $a = np::array([[1, 2], [3, 4]]);
    $b = np::array([[10, 20], [30, 40]]);

    echo "Array A:\n";
    print_r($a->getData());

    echo "\nArray B:\n";
    print_r($b->getData());

    // Dono arrays ko jodein
    $c = np::add($a, $b);

    echo "\nResult of A + B:\n";
    print_r($c->getData());

    echo "\n--- Testing np::arcsin() ---\n";
    $x = np::array([0, 0.5, 1]);
    $asin = np::arcsin($x);
    print_r($asin->getData());

    echo "\n--- Testing np::cube() ---\n";
    $cube = np::cube(np::array([1, -2, 3]));
    print_r($cube->getData());

    echo "\n--- Testing np::equal() ---\n";
    $eq = np::equal(np::array([1, 2, 3]), 2);
    print_r($eq->getData());

    echo "\n--- Testing np::sort() and np::argsort() ---\n";
    $unsorted = np::array([3, 1, 2]);
    $sorted = np::sort($unsorted);
    $argsorted = np::argsort($unsorted);
    print_r($sorted->getData());
    print_r($argsorted->getData());

    echo "\n--- Testing np::lexsort() ---\n";
    $keys = [[2, 1, 2, 1], [0, 1, 0, 1]];
    $lex = np::lexsort($keys);
    print_r($lex->getData());

    echo "\n--- Testing np::swapaxes() ---\n";
    $m = np::array([[1, 2, 3], [4, 5, 6]]);
    $swapped = np::swapaxes($m, 0, 1);
    print_r($swapped->getData());

    echo "\n--- Testing np::fill_diagonal() ---\n";
    $diag = np::array([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
    np::fill_diagonal($diag, 0);
    print_r($diag->getData());

    echo "\n--- Testing np::fromfunction() ---\n";
    $ff = np::fromfunction(function ($i, $j) { return $i + $j; }, [2, 3]);
    print_r($ff->getData());

    echo "\n--- Testing np::fromiter() ---\n";
    $fi = np::fromiter([10, 20, 30, 40], null, 3);
    print_r($fi->getData());

    echo "\n--- Testing np::seed(), np::rand(), np::shuffle(), np::permutation() ---\n";
    np::seed(123);
    $r = np::rand([2, 2]);
    print_r($r->getData());
    $sh = np::array([1, 2, 3, 4]);
    np::shuffle($sh);
    print_r($sh->getData());
    $perm = np::permutation(5);
    print_r($perm->getData());

    echo "\n--- Testing np::eig(), np::svd(), np::qr() ---\n";
    $A = np::array([[3, 1], [0, 2]]);
    [$eigvals, $eigvecs] = np::eig($A);
    print_r($eigvals->getData());
    print_r($eigvecs->getData());
    [$U, $S, $Vt] = np::svd($A);
    print_r($U->getData());
    print_r($S->getData());
    print_r($Vt->getData());
    [$Q, $R] = np::qr($A);
    print_r($Q->getData());
    print_r($R->getData());

} catch (Exception $e) {
    error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
    echo 'Ek error aayi: ' . $e->getMessage() . "\n";
}

echo "\nTest Script Finished.\n";

echo "</pre>";

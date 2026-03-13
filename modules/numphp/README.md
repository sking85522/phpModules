# NumPHP

**NumPHP** is a PHP library for numerical computing, designed to provide an experience similar to Python's NumPy. It aims to be the foundational library for a future AI and data science ecosystem in PHP.

## Project Goals

- **NumPy-like API**: Familiar function names and behavior for easy adoption.
- **Multi-dimensional Arrays**: A powerful `NDArray` object as the core data structure.
- **Vectorized Operations**: Fast, element-wise mathematical and logical operations.
- **Linear Algebra**: Core matrix operations like multiplication, inverse, and determinant.
- **Statistical Functions**: Standard functions like mean, median, std, etc.

## Installation

Currently, the library can be used by including the autoloader.

```php
require_once 'modules/numphp/autoload.php';

use NumPHP\NumPHP as np;
```

## Basic Usage

Here's a quick example of how to use NumPHP:

```php
// Create a 2x3 array
$a = np::array([,]);

// Create another array
$b = np::ones();

// Add them together (element-wise)
$c = np::add($a, $b);

print_r($c->getData());
```
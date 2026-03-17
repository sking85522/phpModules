# Scientific PHP Modules Documentation

This repository now contains powerful data science, data manipulation, plotting, and search engine libraries written entirely in PHP.

---

## 1. SciPHP (SciPy equivalent)
Provides scientific computing tools including optimization, integration, linear algebra, statistics, and signal processing.

**Key Functions:**
- `SciPHP::optimize_minimize($func, $initial_guess)`: Finds the local minimum of a scalar function using Gradient Descent.
- `SciPHP::optimize_newton($func, $initial_guess, $derivative)`: Finds the root of a function using the Newton-Raphson method.
- `SciPHP::integrate_quad($func, $a, $b)`: Computes a definite integral using Simpson's rule.
- `SciPHP::interpolate_interp1d($x, $y)`: 1-D linear interpolation. Returns a callable function for interpolation.
- `SciPHP::linalg_solve($A, $B)`: Solves a linear matrix equation `Ax = B`.
- `SciPHP::linalg_det($A)`: Computes the determinant of a square matrix.
- `SciPHP::linalg_inv($A)`: Computes the inverse of a square matrix.
- `SciPHP::stats_norm_pdf($x, $mean, $std)`: Calculates Normal Distribution PDF.
- `SciPHP::stats_norm_cdf($x, $mean, $std)`: Calculates Normal Distribution CDF.
- `SciPHP::signal_convolve($array1, $array2, $mode)`: Computes 1D linear convolution.

---

## 2. PlotPHP (Matplotlib equivalent)
Allows rendering highly customizable vector charts (SVG) from mathematical arrays.

**Key Functions:**
- `PlotPHP::plot($x, $y, $color, $linewidth)`: Creates a line chart.
- `PlotPHP::scatter($x, $y, $size, $color)`: Creates a scatter plot with specific markers.
- `PlotPHP::bar($categories, $values, $width, $color)`: Creates a bar chart.
- `PlotPHP::title($title)`: Sets the chart title.
- `PlotPHP::xlabel($label)` / `PlotPHP::ylabel($label)`: Sets axis labels.
- `PlotPHP::grid($visible)`: Turns gridlines on/off.
- `PlotPHP::savefig($filename)`: Saves the figure to an `.svg` file.
- `PlotPHP::show()`: Prints out the SVG structure to the browser.
- `PlotPHP::clf()`: Clears the current figure memory.

---

## 3. PandaPHP (Pandas equivalent)
Data structures and data analysis tools for tabular data. Includes `Series` (1D) and `DataFrame` (2D).

**Key Functions:**
- `PandaPHP::DataFrame($data)`: Initializes a new DataFrame from an associative array (dict) or a 2D list.
- `PandaPHP::Series($data)`: Initializes a 1D column/array.
- `PandaPHP::read_csv($filepath)`: Reads a CSV into a DataFrame.
- `$df->to_csv($filepath)`: Writes the DataFrame to a CSV.
- `$df->head($n)`: Returns the first `$n` rows.
- `$df->tail($n)`: Returns the last `$n` rows.
- `$df->shape()`: Returns a `[rows, cols]` array.
- `$df->describe()`: Generates descriptive statistics (count, mean, std, min, max) for numeric columns.
- `$df->iloc($start, $end)`: Purely integer-location based indexing for selection by position.
- `$df->getColumn($name)` or `$df->$name`: Returns a specific column as a Series.

---

## 4. SearchPHP (Elasticsearch / Whoosh equivalent)
An advanced textual search engine implementing the BM25 scoring algorithm, tokenization, stop-words removal, and basic English stemming.

**Key Functions:**
- `$search = new SearchPHP()`: Initializes the search engine and index.
- `$doc = $search->createDocument('id', ['field' => 'text'])`: Prepares a new document.
- `$search->addDocument($doc)`: Adds the document to the inverted index.
- `$search->search($query, $limit)`: Parses the text query and returns a ranked array of the most relevant documents based on BM25 TF-IDF scoring.

---
*For functional examples, please refer to `test_sciphp.php`, `test_plotphp.php`, `test_pandaphp.php`, and `test_search.php`.*

---

## 5. MLPHP (Scikit-Learn equivalent)
A powerful Machine Learning library offering classification, regression, and clustering algorithms implemented in pure PHP.

**Key Features & Models:**
- `MLPHP::LinearRegression()`: Creates an Ordinary Least Squares (OLS) Linear Regression model. Supports `.fit($X, $y)` and `.predict($X)`.
- `MLPHP::LogisticRegression($lr, $epochs)`: Creates a Logistic Regression classifier trained via Gradient Descent. Supports `.fit($X, $y)` and `.predict($X)`.
- `MLPHP::KMeans($n_clusters, $max_iter)`: Creates a K-Means clustering algorithm. Supports `.fit($X)` and `.predict($X)`.
- `MLPHP::StandardScaler()`: Preprocessing tool to scale and normalize datasets (`.fit_transform($X)`).
- `MLPHP::accuracy_score($y_true, $y_pred)`: Computes classification accuracy.
- `MLPHP::mean_squared_error($y_true, $y_pred)`: Computes MSE for regression models.

*For functional examples, please refer to `test_mlphp.php`.*

---

## 6. NeuralPHP (TensorFlow/Keras equivalent)
A lightweight Deep Learning and Neural Network framework to build Multi-Layer Perceptrons in pure PHP. It supports backpropagation, dense layers, activation functions, and SGD.

**Key Features & Models:**
- `NeuralPHP::Sequential()`: Initializes a sequential neural network model.
- `$model->add(NeuralPHP::Dense($input_nodes, $output_nodes, $activation))`: Adds a fully connected layer to the model. Supported activations: `'sigmoid'`, `'relu'`.
- `$model->compile($optimizer, $learning_rate, $loss)`: Compiles the model with the given optimizer (e.g. `'sgd'`) and loss function (e.g. `'mse'`).
- `$model->fit($X_train, $y_train, $epochs)`: Trains the neural network using forward and backpropagation.
- `$model->predict($X_test)`: Feeds forward the inputs and predicts outputs.

*For functional examples (solving the XOR problem), please refer to `test_neuralphp.php`.*

---

## 7. NLPHP (NLTK equivalent)
A robust Natural Language Processing framework in PHP. It includes tokenizers, stemming, and models for text classification.

**Key Features & Models:**
- `NLPHP::word_tokenize($text)`: Tokenizes a string into individual words and punctuation.
- `NLPHP::sent_tokenize($text)`: Tokenizes a string into an array of sentences.
- `NLPHP::remove_stopwords($words_array)`: Removes common English stopwords.
- `NLPHP::stem($words_array)`: Applies a suffix-stripping stemming algorithm to a word or array of words.
- `NLPHP::NaiveBayes()`: A simple Naive Bayes text classifier supporting `.fit($X_texts, $y_labels)` and `.predict($text)`.
- `NLPHP::Chatbot()`: A basic rule-based intent matching chatbot logic module.

*For functional examples, please refer to `test_nlphp.php`.*

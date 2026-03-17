<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/nlphp/autoload.php';
require_once __DIR__ . '/modules/nlphp/NLPHP.php';

use NLPHP\NLPHP as nl;

echo "<pre>";
echo "NLPHP Test Script Start...\n\n";

try {
    echo "--- Testing Tokenization ---\n";
    $text = "Hello world! This is a test. How are you doing today, sir?";
    $words = nl::word_tokenize($text);
    echo "Word Tokens: \n";
    print_r($words);

    $sents = nl::sent_tokenize($text);
    echo "\nSentence Tokens: \n";
    print_r($sents);

    echo "\n--- Testing Stopwords Removal ---\n";
    $filtered = nl::remove_stopwords($words);
    echo "Without Stopwords: \n";
    print_r($filtered);

    echo "\n--- Testing Stemming ---\n";
    $words_to_stem = ['running', 'runs', 'runner', 'happily', 'ponies'];
    $stemmed = nl::stem($words_to_stem);
    echo "Stemmed Words: \n";
    print_r($stemmed);

    echo "\n--- Testing Text Classification (Naive Bayes) ---\n";
    $texts = [
        "I loved this movie, it was absolutely wonderful and amazing.",
        "Terrible experience, the food was awful and service was bad.",
        "Great product! Highly recommend it to everyone.",
        "I hate this, worst purchase ever."
    ];
    $labels = ['positive', 'negative', 'positive', 'negative'];

    $nb = nl::NaiveBayes();
    $nb->fit($texts, $labels);

    $test1 = "This is amazing, I love it!";
    $test2 = "Awful and terrible.";
    echo "Prediction for '$test1': " . $nb->predict($test1) . "\n";
    echo "Prediction for '$test2': " . $nb->predict($test2) . "\n";

    echo "\n--- Testing Rule-Based Chatbot ---\n";
    $bot = nl::Chatbot();
    $bot->addIntent(['hi', 'hello', 'hey'], ['Hello there!', 'Hi! How can I help you?']);
    $bot->addIntent(['how are you', 'how do you do'], ['I am just a PHP bot, doing great!']);
    $bot->addIntent(['bye', 'goodbye'], ['Goodbye!', 'See you later.']);

    echo "User: 'Hey! How are you?'\n";
    echo "Bot: " . $bot->respond("Hey!") . "\n";
    echo "User: 'How are you?'\n";
    echo "Bot: " . $bot->respond("How are you?") . "\n";
    echo "User: 'I want a pizza'\n";
    echo "Bot: " . $bot->respond("I want a pizza") . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nNLPHP Test Script End.\n";
echo "</pre>";

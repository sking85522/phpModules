<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/languagephp/autoload.php';
require_once __DIR__ . '/modules/dictionaryphp/autoload.php';

use LanguagePHP\LanguagePHP as lp;
use DictionaryPHP\DictionaryPHP as dp;

echo "<pre>";
echo "LanguagePHP & DictionaryPHP Test Script Start...\n\n";

try {
    echo "--- Testing Language Detection ---\n";
    $samples = [
        "This is an English sentence.",
        "नमस्ते, आप कैसे हैं?", // Hindi
        "இது ஒரு தமிழ் வாக்கியம்.", // Tamil
        "এটি একটি বাংলা বাক্য।", // Bengali
        "మంచి ఉదయం.", // Telugu
        "मी आज पुण्यात आहे.", // Marathi
        "안녕하세요", // Korean
        "Je suis très heureux aujourd'hui.", // French
    ];

    foreach ($samples as $sample) {
        $result = lp::detect($sample);
        echo "Text: '$sample'\n";
        echo "Detected: {$result['language']} (ISO: {$result['iso']}) [Confidence: " . round($result['confidence'] * 100, 2) . "%]\n\n";
    }

    echo "--- Testing Dictionary Lookup ---\n";
    $word = 'beautiful';
    $meaning = dp::meaning($word);
    if ($meaning) {
        echo "Word: '$word'\n";
        echo "Part of Speech: {$meaning['pos']}\n";
        echo "Meaning: {$meaning['meaning']}\n";
        echo "Synonyms: " . implode(', ', $meaning['synonyms']) . "\n\n";
    }

    echo "--- Testing Translation (En -> Hi) ---\n";
    $wordsToTranslate = ['apple', 'run', 'artificial', 'sun'];
    foreach ($wordsToTranslate as $w) {
        $translated = dp::translateToHindi($w);
        echo "English: '$w' -> Hindi: '$translated'\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nLanguagePHP & DictionaryPHP Test Script End.\n";
echo "</pre>";

<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/numphp/autoload.php';
require_once __DIR__ . '/modules/numphp/NumPHP.php';
require_once __DIR__ . '/modules/speechphp/autoload.php';
require_once __DIR__ . '/modules/speechphp/SpeechPHP.php';
// Include classes manually for this standalone test script if the autoloader fails
require_once __DIR__ . '/modules/speechphp/src/Core/WavParser.php';
require_once __DIR__ . '/modules/speechphp/src/Synthesis/WaveGenerator.php';
require_once __DIR__ . '/modules/speechphp/src/Features/AudioFeatures.php';

use NumPHP\NumPHP as np;
use SpeechPHP\SpeechPHP as sp;

echo "<pre>";
echo "SpeechPHP Test Script Start...\n\n";

try {
    echo "--- Testing Audio Synthesis (Generating a Tone) ---\n";
    // Generate a 440Hz tone (A4 note) for 2 seconds at 44100Hz sample rate
    $sampleRate = 44100;
    $tone = sp::generate_tone(440.0, 2.0, $sampleRate);
    echo "Tone generated. Array size: " . count($tone->getData()) . " samples.\n";

    echo "\n--- Testing Audio I/O (Writing a .wav file) ---\n";
    $filepath = 'test_tone.wav';
    if (sp::write($filepath, $sampleRate, $tone)) {
        echo "Successfully wrote 16-bit PCM Mono audio to $filepath.\n";
        echo "File size: " . filesize($filepath) . " bytes.\n";
    } else {
        echo "Failed to write .wav file.\n";
    }

    echo "\n--- Testing Audio Features ---\n";
    // Calculate Zero-Crossing Rate (ZCR)
    // A 440Hz sine wave over 2 seconds has 440 cycles per second.
    // Each cycle crosses zero twice (positive to negative, negative to positive).
    // Total crossings = 440 * 2 * 2 = 1760. Total samples = 88200. ZCR = 1760 / 88200 = ~0.01995
    $zcr = sp::zero_crossing_rate($tone);
    echo "Zero-Crossing Rate (ZCR) of 440Hz tone: " . round($zcr, 5) . " (Expected ~0.01995)\n";

    // Calculate RMS Energy
    // RMS of a sine wave with amplitude 1 is 1 / sqrt(2) = ~0.707
    $rms = sp::rms_energy($tone);
    echo "RMS Energy of sine wave: " . round($rms, 3) . " (Expected ~0.707)\n";

    // If we want to simulate a Text-to-Speech logic for PHP, it would just concatenate different frequencies
    // to simulate vowel formants, but for now we have a solid base!
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\nSpeechPHP Test Script End.\n";
echo "</pre>";

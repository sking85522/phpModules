<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/modules/search/autoload.php';
require_once __DIR__ . '/modules/search/SearchPHP.php';
require_once __DIR__ . '/modules/search/src/Core/Index.php';
require_once __DIR__ . '/modules/search/src/Core/Document.php';
require_once __DIR__ . '/modules/search/src/Analysis/Analyzer.php';
require_once __DIR__ . '/modules/search/src/Scoring/BM25.php';

use SearchPHP\SearchPHP;

echo "<pre>";
echo "SearchPHP Test Script Start...\n\n";

try {
    $search = new SearchPHP();

    // 1. Create and Add Documents
    echo "Indexing Documents...\n";
    $docs = [
        ['id' => 'doc1', 'title' => 'The quick brown fox jumps over the lazy dog'],
        ['id' => 'doc2', 'title' => 'A fast brown fox leaped over a sleeping dog'],
        ['id' => 'doc3', 'title' => 'The slow white turtle crawls under the lazy dog'],
        ['id' => 'doc4', 'title' => 'Quick foxes are very fast and jump high']
    ];

    foreach ($docs as $d) {
        $doc = $search->createDocument($d['id'], ['title' => $d['title']]);
        $search->addDocument($doc);
        echo "Added document: " . $d['id'] . "\n";
    }

    echo "\n--------------------------------\n";

    // 2. Perform Searches
    $queries = [
        "quick fox",
        "lazy dog",
        "fast leaping foxes",
        "turtle"
    ];

    foreach ($queries as $query) {
        echo "Searching for: '" . $query . "'\n";
        $results = $search->search($query);

        if (empty($results)) {
            echo "  No results found.\n";
        } else {
            foreach ($results as $result) {
                $score = number_format($result['score'], 4);
                $docId = $result['document']->getId();
                $title = $result['document']->getField('title');
                echo "  [Score: $score] DocID: $docId - $title\n";
            }
        }
        echo "\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "SearchPHP Test Script End.\n";
echo "</pre>";

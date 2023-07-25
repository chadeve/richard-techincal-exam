<?php


function shortestWordLength($string) {
    $words = explode(' ', $string);
    $shortestLength = PHP_INT_MAX;

    foreach ($words as $word) {
        $word = trim($word);
        $wordLength = strlen($word);

        if ($wordLength < $shortestLength) {
            $shortestLength = $wordLength;
        }
    }

    return $shortestLength;
}

$testCase1 = "TRUE FRIENDS ARE ME AND YOU";
$output1 = shortestWordLength($testCase1);
echo "Test Case 1 Output: " . $output1 . PHP_EOL; // Output: 2

$testCase2 = "I AM THE LEGENDARY VILLAIN";
$output2 = shortestWordLength($testCase2);
echo "Test Case 2 Output: " . $output2 . PHP_EOL; // Output: 1

$testCase3 = "Daisy can dance";
$output3 = shortestWordLength($testCase3);
echo "Test Case 3 Output: " . $output3 . PHP_EOL; // Output: 3
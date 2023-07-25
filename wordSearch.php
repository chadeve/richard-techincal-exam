<?php
function findTargetIndices($words, $target) {
    $indices = [];
    foreach ($words as $index => $word) {
        if ($word === $target) {
            $indices[] = $index;
        }
    }
    return $indices;
}

$words = ["I", "TWO", "FORTY", "THREE", "JEN", "TWO", "tWo", "Two"];
$target = "tWo";
$output = findTargetIndices($words, $target);
print_r($output);
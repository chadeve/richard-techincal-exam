<?php
function dfs($matrix, $row, $col, &$visited) {
    $numRows = count($matrix);
    $numCols = count($matrix[0]);
    
    if ($row < 0 || $col < 0 || $row >= $numRows || $col >= $numCols || $matrix[$row][$col] === 0 || $visited[$row][$col]) {
        return;
    }

    $visited[$row][$col] = true;
    $matrix[$row][$col] = 'X'; 

 
    $directions = [[-1, 0], [1, 0], [0, -1], [0, 1], [-1, -1], [-1, 1], [1, -1], [1, 1]];
    foreach ($directions as $dir) {
        $newRow = $row + $dir[0];
        $newCol = $col + $dir[1];
        dfs($matrix, $newRow, $newCol, $visited);
    }
}

function countIslands($matrix) {
    $numRows = count($matrix);
    $numCols = count($matrix[0]);
    $visited = array_fill(0, $numRows, array_fill(0, $numCols, false));
    
    for ($row = 0; $row < $numRows; $row++) {
        for ($col = 0; $col < $numCols; $col++) {
            if ($matrix[$row][$col] === 1 && !$visited[$row][$col]) {
                dfs($matrix, $row, $col, $visited);
            }
        }
    }

  
    for ($row = 0; $row < $numRows; $row++) {
        for ($col = 0; $col < $numCols; $col++) {
            if ($matrix[$row][$col] === 1) {
                echo "X";
            } else {
                echo "~";
            }
        }
        echo "\n";
    }
}

$matrix = array(
    array(1, 1, 0, 0, 0),
    array(0, 1, 0, 0, 1),
    array(1, 0, 0, 1, 1),
    array(0, 0, 0, 0, 0),
    array(1, 0, 1, 0, 1)
);

countIslands($matrix);
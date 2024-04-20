<?php
function recursiveFactorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * recursiveFactorial($n - 1);
    }
}

function iterativeFactorial($n) {
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function recursiveFibonacci($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return recursiveFibonacci($n - 1) + recursiveFibonacci($n - 2);
    }
}

function iterativeFibonacci($n) {
    $fib = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib[$n];
}

$startRecursive = microtime(true);
$resultRecursive = recursiveFactorial(20);
$endRecursive = microtime(true);
$timeRecursive = $endRecursive - $startRecursive;

$startIterative = microtime(true);
$resultIterative = iterativeFactorial(20);
$endIterative = microtime(true);
$timeIterative = $endIterative - $startIterative;

echo "Silnia rekurencyjna: $resultRecursive<br>";
echo "Czas wykonania: $timeRecursive sekund<br><br>";

echo "Silnia iteracyjna: $resultIterative<br>";
echo "Czas wykonania: $timeIterative sekund<br><br>";

if ($timeRecursive < $timeIterative) {
    echo "Funkcja rekurencyjna była szybsza o " . ($timeIterative - $timeRecursive) . " sekund.";
} elseif ($timeIterative < $timeRecursive) {
    echo "Funkcja iteracyjna była szybsza o " . ($timeRecursive - $timeIterative) . " sekund.";
} else {
    echo "Czasy wykonania obu funkcji są identyczne.";
}

?>

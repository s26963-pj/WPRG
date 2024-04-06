<?php

    //Zad 1
    $tab = array("jablko", "banan", "pomarancza");
    foreach ($tab as $fruit) {
        echo "$fruit - ";
        $y = strlen($fruit) - 1;
        for ($i = 0; $i < strlen($fruit); $i++) {
            echo $fruit[$y];
            $y--;
        }
        echo "\n";
    }

    //Zad2
    function pierwsza($n)
    {
        if ($n < 2) {
            return false;
        }
        $x = sqrt($n);
        for ($i = 2; $i <= $x; $i++) {
            if (($n % $i) == 0) return false;
        }
        return true;
    }

    $zakres = array(1, 20);
    for ($i = $zakres[0]; $i <= $zakres[1]; $i++) {
        if (pierwsza($i)) {
            echo "$i\n";
        }
    }

    //Zad3
    $n = 20;
    //Wylicza n-tą liczbe Fibbonacciego
    function fib($num)
    {
        if ($num == 0) return 0;
        else if ($num == 1) return 1;
        else {
            return fib($num - 1) + fib($num - 2);
        }
    }
    //Leci do ntej liczby Fibbonaciego zapisujac do tablicy
    for($i = 1; $i <= $n; $i++){
        $tab[$i - 1] = fib($i);
    }
    //Wypisanie tablicy
    for ($i = 0; $i < $n; $i++){
        echo($i+1 . ". " . $tab[$i] .= "\n");
    }

    //Zad 4

    $tekst = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    $tablica = explode(" ", $tekst);



    foreach($tablica as $klucz => $slowo){
        $lastChar = substr($slowo, -1);
        if (strpos('.,?!', $lastChar) !== false){
            $tablica[$klucz] = rtrim($slowo, '.,?!');
            $tablica[$klucz + 1] = ltrim($tablica[$klucz +1], '.,?!');
        }
    }
    $assocArray = [];
    $count = count($tablica);
    for ($i = 0; $i < $count; $i += 2) {
        if (isset($tablica[$i + 1])) {
            $assocArray[$tablica[$i]] = $tablica[$i + 1];
        }
    }
    foreach ($assocArray as $klucz => $wartosc) {
        echo $klucz . " => " . $wartosc . "\n";
    }
?>

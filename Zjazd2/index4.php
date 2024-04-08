<?php
    $number = $_GET['number'];
    function isPrime($number)
    {
        if ($number <= 1) {
            return false;
        }

        for ($i = 2; $i * $i <= $number; $i++) {

            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if (isPrime($number)) {
        echo ("$number jest liczba pierwsza");
    } else{
        echo ("$number nie jest liczba pierwsza");
    }
?>
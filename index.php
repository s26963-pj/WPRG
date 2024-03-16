
<?php
    //Zad 1
    $tab = array("jablko", "banan", "pomarancza");
    foreach ($tab as $fruit){
        echo "$fruit - ";
        $y = strlen($fruit) - 1;
        for($i = 0; $i < strlen($fruit); $i++){
            echo $fruit[$y];
            $y--;
        }
        echo "\n";
    }

    //Zad2

    function pierwsza($n){
        if ($n < 2){
            return false;
        }
        $x = sqrt($n);
        for ($i = 2; $i <= $x; $i++){
            if (($n % $i) == 0) return false;
        }
        return true;
    }
    $zakres = array(1,20);
    for ($i = $zakres[0]; $i <= $zakres[1]; $i++){
        if(pierwsza($i)){
            echo "$i\n";
        }
    }
?>

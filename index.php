
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
?>

<?php
    $liczba_os = $_POST["liczba_osob"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    $karta = $_POST["karta"];
    $data_przyjazdu = $_POST["data_przyjazdu"];
    $data_wyjazdu = $_POST["data_wyjazdu"];

    if ($data_przyjazdu >  $data_wyjazdu){
        echo ("Wprowadzona data jest niepoprawna");
    }else{
        echo("Rezerwacja na " .$imie .$nazwisko ." została potwierdzona.\n"
        ."Data zameldowania: " .$data_przyjazdu ."\nData wymeldowania: " .$data_wyjazdu
        ."\nLiczba osob: " .$liczba_os ."\nPotwierdzenie przyjdzie na email: " .$email);
    }
?>

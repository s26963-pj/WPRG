<?php
    session_start();
    $imiona = $_POST["names"];
    $nazwiska = $_POST["surnames"];
    $imie_osoby_rezerw = $_SESSION['imie_osoby_rezerw'];
    $nazwisko_osoby_rezerw = $_SESSION['nazwisko_osoby_rezerw'];
    $email_osoby_rezerw = $_SESSION['email_osoby_rezerw'];
    $karta_osoby_rezerw = $_SESSION['karta_osoby_rezerw'];
    $data_przyjazdu_osoby_rezerw = $_SESSION['data_przyjazdu_osoby_rezerw'];
    $data_wyjazdu_osoby_rezerw = $_SESSION['data_wyjazdu_osoby_rezerw'];
    $czas_przyjazdu = $_SESSION['czas_przyjazdu'];

    echo("<h1>Podsumowanie rezerwacji</h1>");
    echo ("<br>");
    echo("<h2>Imie osoby rezerwujacej: $imie_osoby_rezerw[0]</h2>");
    echo("<h2>Nazwisko osoby rezerwujacej: $nazwisko_osoby_rezerw[0]</h2>");
    echo("<h2>email kontaktowy: $email_osoby_rezerw</h2>");
    echo("<h2>Data przyjazdu: $data_przyjazdu_osoby_rezerw</h2>");
    echo("<h2>Data wymeldowania: $data_wyjazdu_osoby_rezerw</h2>");
    echo("<h2>Godzina przyjazdu: $czas_przyjazdu</h2>");
    echo ("<br>");
    for ($i = 0; $i < count($imiona); $i++) {
        echo("<h2>Imie i nazwisko osoby towarzyszacej: $imiona[$i]  $nazwiska[$i]</h2>");
        echo("<br>");
    }
?>
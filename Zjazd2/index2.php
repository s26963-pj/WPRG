<?php
    session_start();
    $liczba_os = $_POST["number_of_guests"];
    $imie = $_POST["name"];
    $nazwisko = $_POST["surname"];
    $email = $_POST["email"];
    $karta = $_POST["credit_card"];
    $data_przyjazdu = $_POST["arrival_date"];
    $data_wyjazdu = $_POST["departure_date"];
    $czas_przyjazdu = $_POST["arrival_time"];
    $czy_wiele_gosci = false;

    $_SESSION['imie_osoby_rezerw'] = $imie;
    $_SESSION['nazwisko_osoby_rezerw'] = $nazwisko;
    $_SESSION['email_osoby_rezerw'] = $email;
    $_SESSION['karta_osoby_rezerw'] = $karta;
    $_SESSION['data_przyjazdu_osoby_rezerw'] = $data_przyjazdu;
    $_SESSION['data_wyjazdu_osoby_rezerw'] = $data_wyjazdu;
    $_SESSION['czas_przyjazdu'] = $czas_przyjazdu;

    if ($data_przyjazdu >  $data_wyjazdu) {
        echo("Wprowadzona data jest niepoprawna");
    }

    if ($liczba_os > 1){
        $czy_wiele_gosci = true;
        echo ("<h1>Dane gości</h1>");
        for ($i = 1; $i < $liczba_os; $i++){
            echo ("<form action='index3.php' method='post'>");
            echo ("<label for=names[]>Imię:</label>");
            echo ("<input type=text name=names[] id=name required>");
            echo ("<br>");
            echo ("<label for=surnames[]>Nazwisko:</label>");
            echo ("<input type=text name=surnames[] id=surname required>");
            echo ("<br>");
        }
        echo ("<input type=submit value=Wyślij>");
        echo ("</form>");
    }
    if(!$czy_wiele_gosci) {
        echo("<h1>Podsumowanie rezerwacji</h1>");
        echo("<br>");
        for ($i = 0; $i < $liczba_os; $i++) {
            echo("<h2>$imie[$i]</h2>");
            echo("<h2>$nazwisko[$i]</h2>");
        }
        echo("<h2>$email</h2>");
        echo("<h2>Data przyjazdu: $data_przyjazdu</h2>");
        echo("<h2>Data wymeldowania: $data_wyjazdu</h2>");
        echo("<h2>Godzina przyjazdu: $czas_przyjazdu</h2>");
    }
?>
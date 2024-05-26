<?php

$host = 'localhost';
$dbname = 'userdb';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Polaczenie nie moglo zostac zrealizowane: " . $e->getMessage();
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];

    if (!empty($imie) && !empty($nazwisko) && is_numeric($wiek)) {
        $sql = "INSERT INTO osoba (imie, nazwisko, wiek) VALUES (:imie, :nazwisko, :wiek)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':imie', $imie);
        $stmt->bindParam(':nazwisko', $nazwisko);
        $stmt->bindParam(':wiek', $wiek);
        if ($stmt->execute()) {
            echo "Rekord został pomyślnie dodany.";
        } else {
            echo "Wystąpił błąd podczas dodawania rekordu.";
        }
    } else {
        echo "Proszę wypełnić wszystkie pola prawidłowo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj osobę</title>
</head>
<body>
<h1>Dodaj osobę</h1>
<form method="post" action="">
    <label for="imie">Imię:</label>
    <input type="text" id="imie" name="imie" required>
    <br>
    <label for="nazwisko">Nazwisko:</label>
    <input type="text" id="nazwisko" name="nazwisko" required>
    <br>
    <label for="wiek">Wiek:</label>
    <input type="number" id="wiek" name="wiek" required>
    <br>
    <input type="submit" value="Dodaj">
</form>
</body>
</html>

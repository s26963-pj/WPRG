<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o dacie urodzenia</title>
</head>
<body>
<?php

if (isset($_GET['birthdate'])) {

    $birthdate = $_GET['birthdate'];

    $dayOfWeek = date('l', strtotime($birthdate));
    echo "<p>Urodziłeś/aś się w dniu: $dayOfWeek.</p>";

    $currentDate = date('Y-m-d');
    $age = date_diff(date_create($birthdate), date_create($currentDate))->y;
    echo "<p>Ukończyłeś/aś $age lat.</p>";

    $nextBirthday = date('Y-m-d', strtotime(date('Y-m-d', strtotime($birthdate)) . ' +' . $age + 1 . ' years'));
    $daysUntilNextBirthday = (strtotime($nextBirthday) - strtotime($currentDate)) / (60 * 60 * 24);
    echo "<p>Do Twoich następnych urodzin pozostało $daysUntilNextBirthday dni.</p>";
} else {
    echo "<p>Nie podano daty urodzenia.</p>";
}
?>
</body>
</html>

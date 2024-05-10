<?php
session_start();

// Dane logowania (na sztywno ustawione)
$login = "admin";
$password = "password";

// Obsługa logowania
if(isset($_POST['login']) && isset($_POST['password'])) {
    $entered_login = $_POST['login'];
    $entered_password = $_POST['password'];

    if($entered_login === $login && $entered_password === $password) {
        $_SESSION['logged_in'] = true;
        setcookie('username', $login, time() + (86400 * 30), "/"); // Ciasteczko ważne przez 30 dni
        header("Refresh:0");
    } else {
        echo "Błędny login lub hasło!";
    }
}

// Obsługa wylogowania
if(isset($_GET['logout'])) {
    session_destroy();
    setcookie('username', '', time() - 3600, "/");
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<?php if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
    <form method="post" action="">
        Login: <input type="text" name="login"><br>
        Hasło: <input type="password" name="password"><br>
        <input type="submit" value="Zaloguj">
    </form>
<?php else: ?>
    <form action="?logout" method="post">
        <input type="submit" value="Wyloguj">
    </form>
    <h2>Formularz Rezerwacji Hotelowej</h2>
    <form action="process_reservation.php" method="post">
        <label for="name">Imię i nazwisko:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Adres email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Numer telefonu:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="check_in">Data zameldowania:</label><br>
        <input type="date" id="check_in" name="check_in" required><br><br>

        <label for="check_out">Data wymeldowania:</label><br>
        <input type="date" id="check_out" name="check_out" required><br><br>

        <label for="room_type">Typ pokoju:</label><br>
        <select id="room_type" name="room_type" required>
            <option value="single">Pokój jednoosobowy</option>
            <option value="double">Pokój dwuosobowy</option>
            <option value="suite">Apartament</option>
        </select><br><br>

        <label for="special_requests">Dodatkowe życzenia:</label><br>
        <textarea id="special_requests" name="special_requests" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Zarezerwuj">
    </form>
<?php endif; ?>

</body>
</html>
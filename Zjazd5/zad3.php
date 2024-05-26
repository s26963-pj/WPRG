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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        $sql = "DELETE FROM osoba WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Rekord został pomyślnie usunięty.";
        } else {
            echo "Wystąpił błąd podczas usuwania rekordu.";
        }
    } else {
        echo "Nieprawidłowe ID.";
    }
}

$sql = "SELECT id, imie, nazwisko, wiek FROM osoba";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$osoby = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuń osobę</title>
</head>
<body>
<h1>Usuń osobę</h1>
<form method="post" action="">
    <label for="id">ID osoby do usunięcia:</label>
    <select name="id" id="id" required>
        <option value="">Wybierz ID</option>
        <?php foreach ($osoby as $osoba): ?>
            <option value="<?php echo htmlspecialchars($osoba['id']); ?>"><?php echo htmlspecialchars($osoba['id'] . ' - ' . $osoba['imie'] . ' ' . $osoba['nazwisko']); ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Usuń">
</form>
<h2>Lista osób</h2>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Wiek</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($osoby as $osoba): ?>
        <tr>
            <td><?php echo htmlspecialchars($osoba['id']); ?></td>
            <td><?php echo htmlspecialchars($osoba['imie']); ?></td>
            <td><?php echo htmlspecialchars($osoba['nazwisko']); ?></td>
            <td><?php echo htmlspecialchars($osoba['wiek']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

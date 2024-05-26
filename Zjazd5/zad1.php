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

$columns = ['id', 'imie', 'nazwisko', 'wiek'];
$orderBy = isset($_GET['sort_by']) && in_array($_GET['sort_by'], $columns) ? $_GET['sort_by'] : 'id';

$sql = "SELECT id, imie, nazwisko, wiek FROM osoba ORDER BY $orderBy";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$osoby = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Tabela Osoba</title>
</head>
<body>
<h1>Tabela Osoba</h1>
<form method="get" action="">
    <label for="sort_by">Sortuj według:</label>
    <select name="sort_by" id="sort_by">
        <option value="id" <?php if ($orderBy == 'id') echo 'selected'; ?>>ID</option>
        <option value="imie" <?php if ($orderBy == 'imie') echo 'selected'; ?>>Imię</option>
        <option value="nazwisko" <?php if ($orderBy == 'nazwisko') echo 'selected'; ?>>Nazwisko</option>
        <option value="wiek" <?php if ($orderBy == 'wiek') echo 'selected'; ?>>Wiek</option>
    </select>
    <input type="submit" value="Sortuj">
</form>
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

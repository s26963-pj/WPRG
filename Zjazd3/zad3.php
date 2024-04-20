<?php
function manageDirectory($path, $directory, $operation = 'read') {

    if (substr($path, -1) !== '/') {
        $path .= '/';
    }

    if (!is_dir($path . $directory) && $operation !== 'create') {
        return "Katalog \"$directory\" w ścieżce \"$path\" nie istnieje.";
    }

    switch ($operation) {
        case 'read':
            $contents = scandir($path . $directory);
            return "Zawartość katalogu \"$directory\": " . implode(', ', $contents);
        case 'delete':
            if (count(scandir($path . $directory)) > 2) {
                return "Nie można usunąć katalogu \"$directory\", ponieważ nie jest pusty.";
            }
            if (rmdir($path . $directory)) {
                return "Katalog \"$directory\" został usunięty z ścieżki \"$path\".";
            } else {
                return "Wystąpił błąd podczas usuwania katalogu \"$directory\".";
            }
        case 'create':
            if (mkdir($path . $directory)) {
                return "Katalog \"$directory\" został utworzony w ścieżce \"$path\".";
            } else {
                return "Wystąpił błąd podczas tworzenia katalogu \"$directory\".";
            }
        default:
            return "Nieprawidłowa operacja.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = $_POST["path"];
    $directory = $_POST["directory"];
    $operation = $_POST["operation"];

    echo manageDirectory($path, $directory, $operation);
}

?>

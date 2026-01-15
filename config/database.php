<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'concursuri_sportive');
define('DB_USER', 'appuser');   // userul creat pentru baza de date
define('DB_PASS', 'parola123'); // parola userului

$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (\PDOException $e) {
    die("Eroare DB: " . $e->getMessage());
}

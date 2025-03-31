<?php
$host = 'localhost';
$dbname = 'escape_room';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Database connectie mislukt: " . $e->getMessage());
}
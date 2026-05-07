<?php
$host = 'db_practica7';
$db   = 'botiga';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

// Crear objecte PDO per a la connexió a la base de dades
try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de connexió: " . $e->getMessage());
}

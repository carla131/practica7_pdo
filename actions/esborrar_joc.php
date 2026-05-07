<?php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';

// Agafem la ID que ve de l'enllaç ?id=...
$id = $_GET['id'] ?? null;

if ($id) {
    esborrarJoc($pdo, $id);
}

// Tornem a la llista automàticament
header("Location: ../views/llista.php");
exit;

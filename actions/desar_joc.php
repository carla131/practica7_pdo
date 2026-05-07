<?php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';

$id = $_POST['id'] ?? null;
$titol = $_POST['titol'];
$genere = $_POST['genere'];
$preu = $_POST['preu'];
$dev_id = $_POST['desenvolupador_id'];

if ($id) {
    // Si l'id ja existeix, actualitzem (U de CRUD)
    actualitzarJoc($pdo, $id, $titol, $genere, $preu, $dev_id);
} else {
    // Si no hi ha id, és un joc nou (C de CRUD)
    insertarJoc($pdo, $titol, $genere, $preu, $dev_id);
}

header("Location: ../views/llista.php");
exit;

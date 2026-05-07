<?php
// model/videojoc_db.php

function obtenirTotsElsJocs($pdo) {
    // Hem de fer servir "videojoc" i "desenvolupador" en singular!
    $sql = "SELECT v.*, d.nom AS dev_nom
            FROM videojoc v
            LEFT JOIN desenvolupador d ON v.desenvolupador_id = d.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenirJocPerId($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM videojoc WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function esborrarJoc($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM videojoc WHERE id = ?");
    return $stmt->execute([$id]);
}


function actualitzarJoc($pdo, $id, $titol, $genere, $preu, $dev_id) {
    $sql = "UPDATE videojoc SET titol=?, genere=?, preu=?, desenvolupador_id=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$titol, $genere, $preu, $dev_id, $id]);
}

function insertarJoc($pdo, $titol, $genere, $preu, $dev_id) {
    $sql = "INSERT INTO videojoc (titol, genere, preu, desenvolupador_id, data_llancament) VALUES (?, ?, ?, ?, CURDATE())";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$titol, $genere, $preu, $dev_id]);
}

<?php
function obtenirTotsElsDevs($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM desenvolupador");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Creació del formulari.

<?php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';
require_once '../model/desenvolupador_db.php';

$id = $_GET['id'] ?? null;
$joc = $id ? obtenirJocPerId($pdo, $id) : null;
$devs = obtenirTotsElsDevs($pdo);

include 'header.php';
?>

<div style="background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto;">
    <h2><?= $id ? "Editar Videojoc" : "Afegir Nou Videojoc" ?></h2>

    <form action="../actions/desar_joc.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">

        <p><label>Títol:</label><br>
        <input type="text" name="titol" value="<?= $joc['titol'] ?? '' ?>" required style="width:100%"></p>

        <p><label>Gènere:</label><br>
        <input type="text" name="genere" value="<?= $joc['genere'] ?? '' ?>" required style="width:100%"></p>

        <p><label>Preu:</label><br>
        <input type="number" step="0.01" name="preu" value="<?= $joc['preu'] ?? '' ?>" required style="width:100%"></p>

        <p><label>Desenvolupador:</label><br>
        <select name="desenvolupador_id" style="width:100%">
            <?php foreach ($devs as $d): ?>
                <option value="<?= $d['id'] ?>" <?= (isset($joc) && $joc['desenvolupador_id'] == $d['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($d['nom']) ?> (<?= htmlspecialchars($d['pais']) ?>)
                </option>
            <?php endforeach; ?>
        </select></p>

        <br>
        <button type="submit" style="background: #2c3e50; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
            Desar Canvis
        </button>
        <a href="llista.php" style="margin-left: 10px;">Cancel·lar</a>
    </form>
</div>

<?php include 'footer.php'; ?>

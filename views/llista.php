<?php
// views/llista.php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';

// Obtenim les dades
$videojocs = obtenirTotsElsJocs($pdo);

include 'header.php'; 
?>

<div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2>Catàleg de Videojocs</h2>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Títol</th>
                <th>Gènere</th>
                <th>Preu</th>
                <th>Desenvolupador</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($videojocs)): ?>
                <tr><td colspan="5">No hi ha videojocs a la base de dades.</td></tr>
            <?php else: ?>
                <?php foreach ($videojocs as $joc): ?>
                <tr>
                    <td><?= htmlspecialchars($joc['titol']) ?></td>
                    <td><?= htmlspecialchars($joc['genere']) ?></td>
                    <td><?= $joc['preu'] ?> €</td>
                    <td><?= htmlspecialchars($joc['dev_nom']) ?></td>
                    <td>
                        <a href="formulari_joc.php?id=<?= $joc['id'] ?>">Editar</a> | 
                        <a href="../actions/esborrar_joc.php?id=<?= $joc['id'] ?>" onclick="return confirm('Segur?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

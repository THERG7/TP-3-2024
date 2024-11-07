<?php
include 'conexion.php';

$stmt = $conn->prepare("SELECT * FROM objetos");
$stmt->execute();
$objetos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card-container">
    <?php foreach ($objetos as $objeto): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($objeto['foto']) ?>" alt="Foto de <?= htmlspecialchars($objeto['nombre']) ?>" width="100">
            <h3><?= htmlspecialchars($objeto['nombre']) ?></h3>
            <p><?= htmlspecialchars($objeto['descripcion']) ?></p>

        <form action="editar.php" method="GET">
    <input type="hidden" name="id" value="<?= $objeto['id'] ?>">
    <button type="submit">Editar</button>
</form>

            <form action="eliminar.php" method="POST">
                <input type="hidden" name="id" value="<?= $objeto['id'] ?>">
                <button type="submit">Eliminar</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>


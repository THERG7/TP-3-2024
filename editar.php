<?php
include 'conexion.php';

// Verificar que se haya recibido un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del objeto
    $stmt = $conn->prepare("SELECT * FROM objetos WHERE id = ?");
    $stmt->execute([$id]);
    $objeto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$objeto) {
        echo "Objeto no encontrado.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Objeto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Actualizar Objeto</h2>
    <form action="actualizar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $objeto['id'] ?>">
        <input type="hidden" name="foto_actual" value="<?= htmlspecialchars($objeto['foto']) ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($objeto['nombre']) ?>" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?= htmlspecialchars($objeto['descripcion']) ?></textarea>

        <label for="foto">Foto:</label>
        <input type="file" name="foto">

        <button type="submit">Actualizar</button>
    </form>

    <a href="index.php">Volver a la lista</a>
</body>
</html>

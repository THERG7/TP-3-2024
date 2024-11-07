<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fotoPath = $_POST['foto_actual']; // Ruta actual de la foto

    // Comprobamos si se ha subido una nueva foto
    if (!empty($_FILES['foto']['name'])) {
        // Guardar la nueva foto en la carpeta "uploads"
        $foto = $_FILES['foto'];
        $nuevaFotoPath = "uploads/" . basename($foto['name']);
        
        if (move_uploaded_file($foto['tmp_name'], $nuevaFotoPath)) {
            // Borrar la foto anterior si existe una nueva
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
            // Actualizar la ruta de la foto para guardar en la base de datos
            $fotoPath = $nuevaFotoPath;
        } else {
            echo "Error al subir la nueva foto.";
            exit;
        }
    }

    // Actualizar el objeto en la base de datos
    $stmt = $conn->prepare("UPDATE objetos SET nombre = ?, foto = ?, descripcion = ? WHERE id = ?");
    $stmt->execute([$nombre, $fotoPath, $descripcion, $id]);

    // Redirigir a index.php después de actualizar
    header("Location: index.php");
    exit;
}

// Si se accede a la página directamente (sin POST)
header("Location: index.php");
exit;
?>


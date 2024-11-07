<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Guardar la foto en el directorio "uploads"
    $foto = $_FILES['foto'];
    $fotoPath = "uploads/" . basename($foto['name']);
    move_uploaded_file($foto['tmp_name'], $fotoPath);

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO objetos (nombre, foto, descripcion) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $fotoPath, $descripcion]);

    header("Location: index.php");
}
?>


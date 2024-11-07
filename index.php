<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AMOGUS DE COLORES</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>AMOGUS DE COLORES</h1>

<!-- Formulario para añadir un nuevo objeto -->
<form action="ingresar.php" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="foto">Foto:</label>
    <input type="file" name="foto" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea>

    <button type="submit">Añadir Objeto</button>
</form>

<!-- Listado de objetos -->
<div class="listado-objetos">
    <?php include 'listar.php'; ?>
</div>

</body>
</html>
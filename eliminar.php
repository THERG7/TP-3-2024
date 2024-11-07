<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Eliminar el objeto de la base de datos
    $stmt = $conn->prepare("DELETE FROM objetos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>






    ?>

    </pre>
</body>

</html>
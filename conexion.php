<?php

$servername = "mysql-therg7.alwaysdata.net";
$username = "therg7"; 
$password = "alfonsitoctmmx3"; 
$dbname = "therg7_mi_crud"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>


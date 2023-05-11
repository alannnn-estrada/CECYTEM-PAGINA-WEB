<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "registros";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
/*if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}*/

// Devolver la conexión
return $conn;
?>

<?php
include('dbcon.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$rol = "";
// Verificar si el nombre de usuario está almacenado en la sesión
if (isset($_SESSION['nombre'])) {
    // Obtener el nombre de usuario de la sesión
    $nombreUsuario = $_SESSION['nombre'];
    $idPersona = $_SESSION['id'];
    $imagen = $_SESSION['imagen'];
    $rol=$_SESSION['rol'];
    $palabras = explode(" ", $nombreUsuario); // Dividir el nombre completo en un array de palabras
    $primerNombre = $palabras[0];
} else {
    // El usuario no ha iniciado sesión, mostrar un mensaje alternativo o redirigir al formulario de inicio de sesión
}
?>



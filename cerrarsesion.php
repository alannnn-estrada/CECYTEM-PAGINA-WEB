<?php
// Inicias la sesión
session_start();

// Destruyes todas las variables de sesión
session_unset();

// Destruyes la sesión
session_destroy();

// Rediriges al usuario a otra página después de cerrar la sesión
header("Location: index.php");
exit;
?>
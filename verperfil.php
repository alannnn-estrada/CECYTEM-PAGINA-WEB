<?php
include('dbcon.php');
include('session.php');

// Obtener los datos del usuario actual de la base de datos
$query = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idPersona);
$stmt->execute();
$result = $stmt->get_result();

if ($result && mysqli_num_rows($result) > 0) {
    // Obtener los datos del usuario
    $usuario = mysqli_fetch_assoc($result);
    $nombre = $usuario['nombre'];
    $correo = $usuario['correo'];
    $imagen = $usuario['imagen'];
    $numero_control = $usuario['numero_control'];
    $codigo_postal = $usuario['codigo_postal'];
    $rol = $usuario['rol'];
} else {
    echo "Error al obtener los datos del usuario";
    exit();
}

if(isset($_POST["cerrar_sesion"])) {
    // Destruye todas las variables de sesión
    session_destroy();
 
    // Redirige al usuario a la página de inicio de sesión
    header("Location: registro.php");
    exit();
}

mysqli_close($conn);
?>
<?php include('head-nav.php'); ?>
<link rel="stylesheet" type="text/css" href="css/verperfil.css">
<style>@media screen and (max-width: 863px){footer {position: unset; width: unset;}}</style>
<div class="general">
    <h1>Mi perfil</h1>
    <div class="perfil">
        <img style="border-radius:50%;" src="<?php echo($imagen); ?>" alt="Imagen de perfil">
        <p><strong>Nombre:</strong> <?php echo($nombre); ?></p>
        <p><strong>Correo:</strong> <?php echo($correo); ?></p>
        <p><strong>Número de control:</strong> <?php echo($numero_control); ?></p>
        <p><strong>Código Postal:</strong> <?php echo($codigo_postal); ?></p>
        <p><strong>Rol:</strong> <?php echo($rol); ?></p>
        <br>
        <p>Recuerda que la información que compartes con nosotros es privada y no es compartida a terceros, respetamos tu privacidad!</p>
        <br>
        <p>Esta información solo la puedes ver tú, no esta disponible para otros usuarios.</p>
        <br>
        <p>Si quieres hacer algún cambio, recuerda que en la barra de navegación, en el apartado de tu nombre puedes editar tú perfil!</p>
        <br>
        <p><b>Tienes problemas con tu imagen de perfil? Te pedimos que la cambies, muchas veces son errores ajenos a nosotros.</b></p>
        <br>
        <p><b>Tu imagen aparece una anterior al cambiarla? Te pedimos volver a iniciar sesión :D.</b></p>
        <br>
        <strong><a class="link1" href="editarperfil.php"><p>Desde éste enlace también puedes modificar tu perfil!</p></a></strong>
        <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" name="cerrar_sesion">También dando click aqui puedes <strong>CERRAR SESIÓN</strong> e ingresar con una nueva cuenta.</button>
        </form>
    </div>
</div>
<?php include('footer.php');?>

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
    $rol = $usuario['rol'];
    $municipio = $usuario['municipio'];
    $numero_control= $usuario['numero_control'];
    $cedula = $usuario['cedula'];
    $numero = $usuario['numero'];
    $correo = $usuario['correo'];
    $fecha_nacimiento = $usuario['fecha_nacimiento'];
    $codigo_postal = $usuario['codigo_postal'];
    $curp = $usuario['curp'];
    $imagen = $usuario['imagen'];
    $codigo = ($rol == 'estudiante') ? $usuario['numero_control'] : $usuario['cedula']; // determinar el código correspondiente según el rol
} else {
    echo "Error al obtener los datos del usuario";
    exit();
}

//*AL ACTUALIZAR LOS DATOS
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreNuevo = $_POST['nombre'];
    $cedulaNueva = isset($_POST['cedula']) ? $_POST['cedula'] : '1';
    $numero_controlNuevo = isset($_POST['numero_control']) ? $_POST['numero_control'] : '1';
    $municipioNueva = $_POST['municipio'];
    $numeroNuevo = $_POST['numero'];
    $correoNuevo = $_POST['correo'];
    $fecha_nacimientoNueva = $_POST['fecha_nacimiento'];
    $codigo_postalNuevo = $_POST['codigo_postal'];
    $curpNuevo = $_POST['curp'];
    $imagenNueva = $_FILES['imagen']['name'];
    $imagenTemporal = $_FILES['imagen']['tmp_name'];

    // Verificar que el nombre y correo no estén vacíos
    if (!empty($nombreNuevo) && !empty($correoNuevo)) {
        // Verificar si se cargó una nueva imagen
        if (!empty($imagenNueva)) {
            $imagen = $imagenNueva;
            move_uploaded_file($imagenTemporal, "./upload/" . $imagen);
            $imagen = "./upload/" . htmlspecialchars(basename($_FILES["imagen"]["name"]));
        }

        function validar_formulario($nombre, $rol, $numero_control, $cedula, $municipio, $numero, $correo, $fecha_nacimiento, $codigo_postal, $curp) {
            // Validar el campo "nombre"
            if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
                return "El campo 'Nombre' solo puede contener letras y espacios.";
            }

            // Validar el campo "numero_control" si el rol es "Estudiante"
            if ($rol == 'Estudiante' && !preg_match("/^[0-9]{14}$/", $numero_control)) {
                return "El campo 'Número de control' debe contener 14 dígitos.";
            }

            // Validar el campo "cedula" si el rol no es "Estudiante"
            if ($rol != 'Estudiante' && !preg_match("/^[0-9]{8}$/", $cedula)) {
                return "El campo 'Cédula' debe contener 8 dígitos.";
            }

            // Validar el campo "municipio"
            if (!preg_match("/^[a-zA-Z ]+$/", $municipio)) {
                return "El campo 'Municipio' solo puede contener letras y espacios.";
            }

            // Validar el campo "numero"
            if (!preg_match("/^[0-9]{10}$/", $numero)) {
                return "El campo 'Número telefónico' debe contener 10 dígitos.";
            }

            // Validar el campo "correo"
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                return "El campo 'Correo electrónico' debe contener una dirección de correo válida.";
            }

            // Validar el campo "fecha_nacimiento"
            if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $fecha_nacimiento)) {
                return "El campo 'Fecha de nacimiento' debe tener el formato AAAA-MM-DD.";
            }

            // Validar el campo "codigo_postal"
            if (!preg_match("/^[0-9]{5}$/", $codigo_postal)) {
                return "El campo 'Código postal' debe contener 5 dígitos.";
            }

            // Validar el campo "curp"
            if (!preg_match("/^[A-Z0-9]{16}$/", $curp)) {
                return "El campo 'CURP' debe contener 16 caracteres alfanuméricos.";
            }

            // Si todos los campos son válidos, devolver un mensaje de éxito
        }

        $mensaje_error = validar_formulario($nombreNuevo, $rol, $numero_controlNuevo, $cedulaNueva, $municipioNueva, $numeroNuevo, $correoNuevo, $fecha_nacimientoNueva, $codigo_postalNuevo, $curpNuevo);
        if ($mensaje_error) {
            echo $mensaje_error;
		echo "<script>setTimeout(function() {
                    window.location.href = 'editarperfil.php';
                }, 4000);</script>";
            exit();
        }

        // Actualizar los datos del usuario en la base de datos
        if ($rol == 'estudiante') {
            $query = "UPDATE usuarios SET nombre = ?, numero_control = ?, municipio = ?, numero = ?, correo = ?, fecha_nacimiento = ?, codigo_postal = ?, curp = ?, imagen = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssssssi", $nombreNuevo, $numero_controlNuevo, $municipioNueva, $numeroNuevo, $correoNuevo, $fecha_nacimientoNueva, $codigo_postalNuevo, $curpNuevo, $imagen, $idPersona);
        } else {
            $query = "UPDATE usuarios SET nombre = ?, cedula = ?, municipio = ?, numero = ?, correo = ?, fecha_nacimiento = ?, codigo_postal = ?, curp = ?, imagen = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
           $stmt->bind_param("sssssssssi", $nombreNuevo, $cedulaNueva, $municipioNueva, $numeroNuevo, $correoNuevo, $fecha_nacimientoNueva, $codigo_postalNuevo, $curpNuevo, $imagen, $idPersona);
        }

        if ($stmt->execute()) {
            // Redirigir a la página de inicio de sesión
            echo "<script>alert('Datos modificados exitosamente'); setTimeout(function() {
                    window.location.href = 'enviado.php';
                }, 2000);</script>";
            exit();
        } else {
            echo "<script>alert('Error al actualizar información, si es un error ajeno a ti favor de comunicarte con nosotros para darte una solución'); setTimeout(function() {
                    window.location.href = 'editarperfil.php';
                }, 2000);</script>";
            exit();
        }
    } else {
        echo "<script>alert('Nombre y correo vacios, favor de ingresar información'); setTimeout(function() {
                    window.location.href = 'editarperfil.php';
                }, 2000);</script>";
        exit();
    }
}
?>
<?php include('head-nav.php'); include('dbcon.php'); include('session.php');?>
<link rel="stylesheet" type="text/css" href="css/editarperfil.css">
<div id="contenidop">
    <h1>Perfil de Usuario</h1>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Rol:</strong> <?php echo $rol; ?></p>
    <p><strong>Municipio:</strong> <?php echo $municipio; ?></p>
    <p><strong>Número telefónico:</strong> <?php echo $numero; ?></p>
    <p><strong>Correo electrónico:</strong> <?php echo $correo; ?></p>
    <p><strong>Fecha de nacimiento:</strong> <?php echo $fecha_nacimiento; ?></p>
    <p><strong>Código Postal:</strong> <?php echo $codigo_postal; ?></p>
    <p><strong>CURP:</strong> <?php echo $curp; ?></p>
    <p><strong>Imágen:</strong></p>
    <img id="u-img" src="<?php echo $imagen; ?>" alt="Imagen de perfil" width="200" height="200">
    <br>
    <h1 style="color: blue;">Recuerda que tambien puedes visualizar tu perfil en la barra de navegación, en el apartado de tu imagen.</h1>
    <h3 style="color: green; margin-bottom: 25px;">Tambien todos los datos que ingreses deben de ser reales ya que puedes tener problemas con tu cuenta. Todos tus datos están seguros.</h3>
    <h3 style="color: red; margin-bottom: 25px;">Si tienes problemas con tu imagen de perfil, te pedimos que la cambies, muchas veces son errores ajenos a nosotros.</h3>
    <h3 style="color: grey; margin-bottom: 25px;">Tambien si tu imagen aparece una anterior al cambiarla, te pedimos volver a iniciar sesión :D.</h3>
    <h2>Actualizar información:</h2>
    <br>
</div>
    <form method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"><br>
        <?php if ($rol == 'Estudiante') { ?>
            <label for="numero_control">Número de control:</label>
            <input type="number" name="numero_control" id="numero_control" pattern="[0-9]{14}" value="<?php echo $numero_control; ?>"><br>
        <?php } else { ?>
            <label for="cedula">Cédula:</label>
            <input type="number" name="cedula" id="cedula" pattern="[0-9]{8}"value="<?php echo $cedula; ?>"><br>
        <?php } ?>
        <label for="municipio">Municipio:</label>
        <input type="text" name="municipio" id="municipio" value="<?php echo $municipio; ?>"><br>
        <label for="numero">Número telefónico:</label>
        <input type="number" name="numero" id="numero" maxlength="10" minlength="10" pattern="[0-9]{10}" value="<?php echo $numero; ?>"><br>
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $correo; ?>"><br>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>"><br>
        <label for="codigo_postal">Código Postal:</label>
        <input type="number" name="codigo_postal" id="codigo_postal"  maxlength="5" minlength="5" pattern="[0-9]{5}" value="<?php echo $codigo_postal; ?>"><br>
        <label for="curp">CURP:</label>
        <input type="text" name="curp" id="curp" maxlength="16" pattern="[A-Z0-9]{16,16}" value="<?php echo $curp; ?>"><br>
        <label for="imagen">Imágen de perfil:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <input type="submit" value="Actualizar">
    </form>
<?php include('footer.php');?>
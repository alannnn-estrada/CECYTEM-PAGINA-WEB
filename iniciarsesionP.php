<?php
include('dbcon.php');

$email = $_POST['correo'];
$password = $_POST['contrasena'];

// Verificar que el correo y la contraseña no estén vacíos
if (!empty($email) && !empty($password)) {
    // Buscar al usuario en la base de datos por el correo
    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar que se encontró al usuario
    if ($result && mysqli_num_rows($result) > 0) {
        // Obtener los datos del usuario de la base de datos
        $user = mysqli_fetch_assoc($result);

        // Verificar que la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($password, $user['contrasena'])) {
            
            // Iniciar sesión y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION['correo'] = $user['correo'];
            
            //Buscar el nombre del usuario por el correo
            $nombre_query = "SELECT nombre FROM usuarios WHERE correo = ?";
            $nombre_stmt = $conn->prepare($nombre_query);
            $nombre_stmt->bind_param("s", $email);
            $nombre_stmt->execute();
            $nombre_result = $nombre_stmt->get_result();
            $nombre = mysqli_fetch_assoc($nombre_result)['nombre'];
            
            //Pide el ID de la persona segun los datos
            $id_query = "SELECT id FROM usuarios WHERE correo = ?";
            $id_stmt = $conn->prepare($id_query);
            $id_stmt->bind_param("s", $email);
            $id_stmt->execute();
            $id_result = $id_stmt->get_result();
            $id_persona = mysqli_fetch_assoc($id_result)['id'];

            $imagen_query = "SELECT imagen FROM usuarios WHERE correo = ?";
            $imagen_stmt = $conn->prepare($imagen_query);
            $imagen_stmt->bind_param("s", $email);
            $imagen_stmt->execute();
            $imagen_result = $imagen_stmt->get_result();
            $imagen = mysqli_fetch_assoc($imagen_result)['imagen'];

            $rol_query = "SELECT rol FROM usuarios WHERE correo = ?";
            $rol_stmt = $conn->prepare($rol_query);
            $rol_stmt->bind_param("s",$email);
            $rol_stmt->execute();
            $rol_result = $rol_stmt->get_result();
            $rol = mysqli_fetch_assoc($rol_result)['rol'];
            
            $_SESSION['nombre'] = $nombre;
            $_SESSION['id'] = $user['id'];
            $_SESSION['imagen'] = $imagen;
            $_SESSION['rol'] = $rol;

            include('session.php');
            echo "<script>alert('Redirigiendo....'); setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);</script>";
            exit();
        } else {
            // La contraseña es incorrecta
            echo "<script>alert('La contraseña es incorrecta'); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
        }
    } else {
        // El usuario no se encontró en la base de datos
        echo "<script>alert('Usuario no encontrado'); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
    }
} else {
    // El correo o la contraseña están vacíos
    echo "<script>alert('Ingrese corrreo o contraseña); setTimeout(function() {
                    window.location.href = 'registro.php';
                }, 2000);</script>";
}
mysqli_close($conn);
?>
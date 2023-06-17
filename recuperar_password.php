<?php
include('dbcon.php');
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET['email'];
    $token = $_GET['token'];
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = $_POST['token'];
}

if (isset($email) && isset($token)){
    $sql = "SELECT * FROM `usuarios` WHERE correo='$email' AND token='$token'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Mostrar un formulario para que el usuario pueda ingresar su nueva contraseña
        
        echo '
                <?php include("head-nav.php");?>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    }
                    
                    h2 {
                    text-align: center;
                    margin-top: 30px;
                    }
                    
                    form {
                    margin: 0 auto;
                    max-width: 400px;
                    padding: 20px;
                    }
                    
                    label {
                    display: block;
                    margin-top: 20px;
                    }
                    
                    input[type="password"] {
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    margin-bottom: 20px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    }
                    
                    input[type="submit"] {
                    background-color: #056908;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 16px;
                    }
                    
                    input[type="submit"]:hover {
                    background-color: #45a049;
                    }
                </style>
                <body>
                    <div>
                        <h2>Restablecer contraseña</h2>
                        <form method="post" action="recuperar_password.php">
                            <input type="hidden" name="email" value="' . $email . '">
                            <input type="hidden" name="token" value="' . $token . '">
                            <label for="password">Nueva contraseña:</label>
                            <input type="password" id="password" name="password" pattern="[a-zA-Z.@ñ]{8-22}">
                            <label for="confirm_password">Confirmar contraseña:</label>
                            <input type="password" id="confirm_password" pattern="[a-zA-Z.@ñ]{8-22}" name="confirm_password">
                            <input type="submit" value="Restablecer contraseña">
                        </form>
                    </div>
                    <?php include("footer.php");?>
                </body>
        ';
        if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Validar los campos de contraseña
            $validacion = validar_textarea($password, $confirm_password);

            if ($validacion !== "Los campos de contraseña son válidos.") {
                // Si los campos de contraseña no son válidos, mostrar mensaje de error
                echo "<script>alert('$validacion')</script>";
            } else {
                // Verificar que la nueva contraseña sea diferente a la contraseña actual en la base de datos
                $query = "SELECT contrasena FROM usuarios WHERE correo = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($hashed_password === $row['contrasena']) {
                        echo "<script>alert('La nueva contraseña no puede ser la misma que la actual.');</script>";
                    } else {
                        // Actualizar la contraseña en la base de datos
                        $query = "UPDATE usuarios SET contrasena = ? WHERE correo = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("ss", $hashed_password, $email);
                        $stmt->execute();
                        echo "<script>alert('La contraseña se ha actualizado correctamente.');setTimeout(function() {
                            window.location.href = 'registro.php';
                        }, 2000);</script>";
                    }
                } else {
                    echo "<script>alert('Hubo un error al verificar la contraseña actual.');</script>";
                }
            }
        }
    } else {
        // Si el token no es válido, mostrar un mensaje de error
        echo "<script>alert('El token no es válido. Por favor, solicite otro enlace de restablecimiento de contraseña.'); setTimeout(function() {
            window.location.href = 'registro.php';
        }, 2000);</script>";
    }
}

function validar_textarea($password, $confirm_password) {
    $validacion = "Los campos de contraseña son válidos.";
    if ($password !== $confirm_password) {
        $validacion = "Las contraseñas no coinciden.";
    } else if (!preg_match('/^[a-zA-Z0-9.@ñ]{8,22}$/', $password)) {
        $validacion = "La contraseña debe tener entre 8 y 22 caracteres y solo puede contener numero, letras, puntos, arrobas.";
    } else if (!preg_match('/[a-zA-Z]/', $password)) {
        $validacion = "La contraseña debe contener al menos una letra.";
    } else if (!preg_match('/[@.]/', $password)) {
        $validacion = "La contraseña debe contener al menos un punto o una arroba.";
    }
    return $validacion;
}
?>